//The time limit for this quiz, in seconds
var TIME_LIMIT = 30;

//The number of questions to ask per game
var QUESTION_COUNT = 5;

//The entire set of questions
var QUIZ_QUESTIONS = [
    ["Approximately what proportion of Australians are affected by CVD?", ["80%", "20%", "50%", "5%"], 1],
    ["In which group are hospitalisation rates for CVD double that of the average?", ["Men", "Women", "Aboriginal and Torres Strait Islanders", "Under 18 year olds"], 2],
    ["Which is not a factor that can be helped by treatment with medicines?", ["Calorie intake", "Chance of heart attack", "Blood pressure", "Cholesterol"], 0],
    ["Which foods should be avoided to reduce the risk of CVD?", ["Low fat foods", "Salty foods", "Fruit", "Meat"], 1],
    ["A BMI of 22.25 would be considered", ["Underweight", "Overweight", "Obese", "Normal weight"], 3],
    ["Which would not be considered a type of CVD?", ["Stroke", "Congenital heart disease", "Obesity", "Aeortic aneurysm"], 2],
    ["Which symptom is not likely to be linked to a CVD?", ["Sneezing", "Sweating", "Fatigue", "Chest pain"], 0],
    ["Which food would be best for a healthy diet?", ["Soft drink", "Butter", "Milk", "Chocolate"], 2],
    ["Which is not an important part of a healthy lifestyle for the prevention of CVDs?", ["Healthy diet", "Not smoking", "Physical exercise", "Reading"], 3]];

var answerButtons;
var buttonA, buttonB, buttonC, buttonD;
var questionText;
var resultText;
var timer;

//The time for the current game
var curTime = 0;
//The current question
var questionNumber = 0;
//The number of questions that have been answered correctly
var correct = 0;
//The questions to ask for the current game
var questions = null;

//On document loaded
$(document).ready(function() {
    
    answerButtons = $(".quiz_button");
    
    questionText = $("#quiz_question");
    timer = $("#quiz_timer");
    resultText = $("#quiz_result");
    
    $(".start_button").click(function() {
        startGame();
    });
    
    $("#giveup_button").click(function() {
        giveup();
    });
    
    answerButtons.click(answerClicked);
});

function startGame() {
    curTime = 0;
    questionNumber = 0;
    correct = 0;
    questions = getRandomSubarray(QUIZ_QUESTIONS, QUESTION_COUNT);
    
    showQuestion(questionNumber);
    
    timer.text(TIME_LIMIT);
    setTimeout(updateTimer, 1000);
    
    $("#quiz_start").hide();
    $("#quiz_end").hide();
    $("#quiz_main").show();
}

function updateTimer() {
    
    //If game has stopped
    if (questions == null) {
        return;
    }
    
    curTime++;
    
    if (curTime >= TIME_LIMIT) {
        //Time has run out
        gameFinished();
    }
    else {
        timer.text(TIME_LIMIT - curTime);
        setTimeout(updateTimer, 1000);
    }
}

//Displays the question for the current game with the current index
function showQuestion(index) {
    var question = questions[index];
    questionText.text(question[0]);
    
    //Set the answer button text
    for (var i = 0; i < 4; i++) {
        answerButtons[i].innerText = question[1][i];
    }
}

function answerClicked(event) {
    //Check the correct answer was pressed
    if (answerButtons.index(event.target) == questions[questionNumber][2]) {
        correct++;
    }
    
    //Advance to the next question
    questionNumber++;
    if (questionNumber >= QUESTION_COUNT) {
        gameFinished();
    }
    else {
        showQuestion(questionNumber);
    }
}

function gameFinished() {
    $("#quiz_main").hide();
    $("#quiz_end").show();
    
    var score = calcScore();
    postScore(score);
    
    var result = "Correct: " + correct + "/" + QUESTION_COUNT +
        "<br/>Score: " + score;
        
    if (!isLoggedIn()) {
        result += "<br/><br/>Log in to post your high scores!";
    }
    
    resultText.html(result);
    questions = null;
}

function giveup() {
    questions = null;
    $("#quiz_main").hide();
    $("#quiz_start").show();
}

//Function to get random questions for this game from the entire set of questions
//Sourced from a StackOverflow answer
function getRandomSubarray(arr, size) {
    var shuffled = arr.slice(0), i = arr.length, min = i - size, temp, index;
    while (i-- > min) {
        index = Math.floor((i + 1) * Math.random());
        temp = shuffled[index];
        shuffled[index] = shuffled[i];
        shuffled[i] = temp;
    }
    return shuffled.slice(min);
}

//Calculates the score based on the correct answers and time left
function calcScore()
{
    var percentageTimeLeft = 1 - (curTime / TIME_LIMIT);
    var percentageCorrect = correct / QUESTION_COUNT;
    
    return Math.round(1000 * percentageCorrect + percentageCorrect * 400 * percentageTimeLeft);
}

//Posts the score to the database
function postScore(score) {
    
    //Stop if the user is not logged in
    if (!isLoggedIn()) {
        return;
    }
    
    //Send an AJAX request with the user authentication and score
    $.ajax({
		url : "database/post_score.php",
		type : "POST",
		data : "userid=" + getCookie("userId") + "&token=" +
		    getCookie("token")+ "&score=" + score,
		success : function(data) {
			console.log(data);
			
			if (data == "success") {
			    resultText.append("<br/>Successfully posted score.");
			}
			else {
			    resultText.append("<br/>Failed to post score.");
			}
		}
	});
}