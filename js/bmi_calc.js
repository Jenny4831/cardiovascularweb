var heightLabel;
var heightInput;

var weightLabel;
var weightInput;

var nonAsianRadio;
var asianRadio;
var metricRadio;
var imperialRadio;

var bmiLabel;
var bmiInput;

var infoElement;

var saveButton;
var saveResult;

var MAX_BMI = 50;
var BMI_BOUNDS = [18.5, 25, 30];
var ASIAN_BMI_BOUNDS = [18.5, 23, 27.5];

//Current values
var curHeight; //In CM
var curWeight; //In KG
var curBmi;
var metric;
var asian;

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
    
    bmiLabel = $("#bmi_label");
    bmiInput = $("#bmi_input");
    bmiInput.slider({
      min: 0,
      max: MAX_BMI,
      step: 0.25,
      slide: bmiSliderChange
    });
    
    nonAsianRadio = $("#non_asian_radio");
    asianRadio = $("#asian_radio");
    nonAsianRadio.change(ethnicChange);
    asianRadio.change(ethnicChange);
    
    metricRadio = $("#metric_radio");
    imperialRadio = $("#imperial_radio");
    metricRadio.change(unitChange);
    imperialRadio.change(unitChange);
    
    infoElement = $("#bmi_info");
    
    saveButton = $("#save_button");
    saveButton.click(saveClick);
    saveResult = $("#save_result");
    
    //Update with default values
    curHeight = 160;
    curWeight = 60;
    updateBmi();
    metric = true;

    ethnicChange();
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
        updateBmi();
        if (userData.preferimperial) {
            metric = userData.preferimperial != "t";
            if (!metric) {
                imperialRadio.attr("checked", true);
            }
        }
        if (userData.asian) {
            asian = userData.asian == "t";
            if (asian) {
                asianRadio.attr("checked", true);
            }
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
        userData.preferimperial = (metric ? "f" : "t");
        userData.asian = (asian ? "t" : "f");
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
    updateBmi();
    updateElements();
}

function weightSliderChange(event, ui) {
    curWeight = parseInt(ui.value);
    updateBmi();
    updateElements();
}

function bmiSliderChange(event, ui) {
    // curBmi = parseFloat(bmiInput.slider("value"));
    curBmi = parseFloat(ui.value);
    //Update the weight input based on the desired BMI
    updateWeight();
    updateElements();
}

function unitChange() {
    metric = metricRadio.is(":checked");
    
    updateElements();
}

function ethnicChange() {
    asian = asianRadio.is(":checked");
    
    //Update the background gradient of the BMI slider
    var bounds = getBmiBounds();
    var startGreen = 100 * bounds[0] / MAX_BMI;
    var endGreen = 100 * bounds[1] / MAX_BMI;
    bmiInput.css("background", "linear-gradient(to right, #ff6464 " + (startGreen - 15) + "%, #64ff64 " + startGreen + "%, #64ff64 " + endGreen + "%, #ff6464 " + (endGreen + 15) + "%)");
    
    updateElements();
}

function updateElements() {
    //Height
    heightLabel.text(getHeightString(curHeight));
    heightInput.slider("value", curHeight);
    
    //Weight
    weightLabel.text(getWeightString(curWeight));
    weightInput.slider("value", curWeight);
    
    //BMI
    bmiLabel.text(getBmiString(curBmi));
    bmiInput.slider("value", curBmi);
    
    //BMI Info
    infoElement.text("You are " + getCategoryString(getCategory()) + ".");
}

function updateBmi() {
    curBmi = calcBmi(curHeight, curWeight);
}

//Updates the weight based on a desired BMI value
function updateWeight() {
    var metres = curHeight / 100;
    curWeight = Math.round(curBmi * (metres * metres))
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

function getBmiString(bmi) {
    return "BMI: " + bmi.toFixed(2);
}

function getBmiBounds() {
    if (asian) {
        return ASIAN_BMI_BOUNDS;
    }
    else {
        return BMI_BOUNDS;
    }
}

//Returns the weight categorisation for the current BMI value
//-1: underweight, 0: normal, 1: overweight, 2: obese
function getCategory() {
    var bounds = getBmiBounds();
    
    if (curBmi < bounds[0]) {
        return -1;
    }
    else if (curBmi < bounds[1]) {
        return 0;
    }
    else if (curBmi < bounds[2]) {
        return 1;
    }
    else {
        return 2;
    }
}

function getCategoryString(category) {
    if (category == -1) {
        return "underweight";
    }
    else if (category == 0) {
        return "a normal weight";
    }
    else if (category == 1) {
        return "overweight";
    }
    else {
        return "obese";
    }
}