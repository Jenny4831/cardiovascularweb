<!DOCTYPE <!DOCTYPE html>
<html>
    <head>
        <title>Quiz - Beat It</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link rel="stylesheet" type="text/css" href="css/quiz.css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="js/cookie.js"></script>
        <script src="js/login.js"></script>
        <script src="js/navigation.js"></script>
        <script src="js/quiz.js"></script>
    </head>
    <body>
        <?php include 'header.php' ?>
        
        <section>
            <div class="content">
                <h1>Quiz</h1>
                <article>
                    <div id="quiz_start">
                        <button class="start_button">Start Game</button>
                        <br/>
                        <a href="high_scores.php">View high scores</a>
                    </div>
                    <div id="quiz_main" style="display: none">
                        <p id="quiz_question">Question</p>
                        <p id="quiz_timer">5</p>
                        <button class="quiz_button">Answer</button>
                        <button class="quiz_button">Answer</button>
                        <button class="quiz_button">Answer</button>
                        <button class="quiz_button">Answer</button>
                        <button id="giveup_button">Give Up</button>
                    </div>
                    <div id="quiz_end" style="display: none">
                        <p id="quiz_result">Result page</p>
                        <button class="start_button">Play Again</button>
                        <br/>
                        <a href="high_scores.php">View high scores</a>
                    </div>
                </article>
            </div>
        </section>

        <?php include 'footer.php' ?>
    </body>
</html>