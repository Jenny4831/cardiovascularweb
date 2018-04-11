var heightLabel;
var heightInput;

var weightLabel;
var weightInput;

var ageLabel;
var ageInput;

var metricRadio;
var imperialRadio;

var maleRadio;
var femaleRadio;

var calorieRadio;
var kilojouleRadio;

var activitySelector;

var bmrResult;
var finalResult;

var saveButton;
var saveResult;

//Current values
var curHeight; //In CM
var curWeight; //In KG
var curAge;
var metric;
var male;
var calories;
var activity;

//On document loaded
$(document).ready(function() {
    heightLabel = $("#height_label");
    heightInput = $("#height_input");
    heightInput.slider({
      min: 50,
      max: 280,
      slide: heightSliderChange
    });
    
    weightLabel = $("#weight_label");
    weightInput = $("#weight_input");
    weightInput.slider({
      min: 10,
      max: 280,
      slide: weightSliderChange
    });
    
    ageLabel = $("#age_label");
    ageInput = $("#age_input");
    ageInput.slider({
      min: 0,
      max: 150,
      slide: ageSliderChange
    });
    
    metricRadio = $("#metric_radio");
    imperialRadio = $("#imperial_radio");
    metricRadio.change(unitChange);
    imperialRadio.change(unitChange);
    
    maleRadio = $("#male_radio");
    femaleRadio = $("#female_radio");
    maleRadio.change(genderChange);
    femaleRadio.change(genderChange);
    
    calorieRadio = $("#calorie_radio");
    kilojouleRadio = $("#kilojoule_radio");
    calorieRadio.change(eunitChange);
    kilojouleRadio.change(eunitChange);
    
    activitySelector = $("#activity_selector");
    activitySelector.change(activityChange)
    
    bmrResult = $("#bmr_result");
    finalResult = $("#final_result");
        
    saveButton = $("#save_button");
    saveButton.click(saveClick);
    saveResult = $("#save_result");
    
    //Update elements with default values
    curHeight = 160;
    curWeight = 60;
    curAge = 20;
    male = true;
    metric = true;
    calories = true;
    activity = 2; //Moderately active
    
    updateElements();
});

//Called when information is loaded from the database
function updateFromDatabase() {
    if (isLoggedIn()) {
        if (userData.height) {
            curHeight = userData.height;
        }
        if (userData.weight) {
            curWeight = userData.weight;
        }
        if (userData.age) {
            curAge = userData.age;
        }
        if (userData.gender) {
            male = userData.gender == "t";
        }
        if (userData.preferimperial) {
            metric = userData.preferimperial != "t";
        }
        if (userData.preferkilojoule) {
            calories = userData.preferkilojoule != "t";
        }
        if (userData.activity) {
            activity = userData.activity;
        }
        
        updateElements();
        
        //Enable the save button
        saveButton.attr("disabled", false);
        saveResult.text("Press save to remember your details for later.");
    }
    else {
        //Disable the save button
        saveButton.attr("disabled", true);
        saveResult.text("Login to save your details for later.");
    }
}

function saveClick(event) {
    if (isLoggedIn()) {
        //Update the user data with the selected values
        userData.height = curHeight;
        userData.weight = curWeight;
        userData.age = curAge;
        userData.gender = (male ? "t" : "f");
        userData.preferimperial = (metric ? "f" : "t");
        userData.preferkilojoule = (calories ? "f" : "t");
        userData.activity = activitySelector[0].selectedIndex;
        //Save the data to the database
        saveResult.text("Saving your details...");
        updateUserData( function(successful) {
            if (successful) {
                saveResult.text("Successfully updated your details.");
            }
            else {
                saveResult.text("Failed to update your details.");
            }
        });
    }
}

function heightSliderChange(event, ui) {
    curHeight = parseInt(ui.value);
    updateElements();
}

function weightSliderChange(event, ui) {
    curWeight = parseInt(ui.value);
    updateElements();
}

function ageSliderChange(event, ui) {
    curAge = parseInt(ui.value);
    updateElements();
}

function unitChange() {
    metric = metricRadio.is(":checked");
    updateElements();
}

function genderChange() {
    male = maleRadio.is(":checked");
    updateElements();
}

function eunitChange() {
    calories = calorieRadio.is(":checked");
    updateElements();
}

function activityChange() {
    activity = activitySelector[0].selectedIndex;
    updateElements();
}

function updateElements() {
    //Height
    heightLabel.text(getHeightString(curHeight));
    heightInput.slider("value", curHeight);
    
    //Weight
    weightLabel.text(getWeightString(curWeight));
    weightInput.slider("value", curWeight);
    
    //Age
    ageLabel.text(getAgeString(curAge));
    ageInput.slider("value", curAge);
    
    //Radios
    maleRadio.attr("checked", male);
    femaleRadio.attr("checked", !male);
    
    metricRadio.attr("checked", metric);
    imperialRadio.attr("checked", !metric);
    
    calorieRadio.attr("checked", calories);
    kilojouleRadio.attr("checked", !calories);

    activitySelector[0].selectedIndex = activity;
    
    var bmr = calcBmr(curWeight, curHeight, curAge, male);
    bmrResult.text(getBmrString(bmr));
    finalResult.html(getResultString(bmr));
}

function getHeightString(height) {
    if (metric) {
        return "Height: " + height + "cm";
    }
    else {
        return "Height: " + (height * 0.032808399).toFixed(2) + " feet";
    }
}

function getWeightString(weight) {
    if (metric) {
        return "Weight: " + weight + "kg";
    }
    else {
        return "Weight: " + (weight * 2.20462).toFixed(2) + " pounds";
    }
}

function getAgeString(age) {
    return "Age: " + age;
}

function getBmrString(bmr) {
    if (calories) {
        return "Basal Metabolic Rate: " + bmr.toFixed(2) + " Calories/day";
    }
    else {
        bmr *= 4.184;
        return "Basal Metabolic Rate: " + bmr.toFixed(2) + " kilojoules/day";
    }
}

function getResultString(bmr) {
    var energy = calcDailyCal(bmr, activity, calories);
    
    var result = "This means that you need to consume <strong>";
    result += energy;
    return result + "</strong> in order to maintain your weight.";
}

