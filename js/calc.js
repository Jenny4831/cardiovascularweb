/**
 * Provides functions for calculating and displaying BMI and Calories for the
 * calculators and user page
*/

//The changed in energy consumption for each activity level
var activityFactors = [1.2, 1.375, 1.55, 1.725, 1.9];

//Takes the height in cm and weight in kg and returns the BMI
function calcBmi(height, weight) {
    var metres = height / 100;
    return weight / (metres * metres);
}

//Calculates the basal metabolic rate
function calcBmr(weight, height, age, male) {
    return 10 * weight + 6.25 * height - 5 * age + (male ? 5 : -161);
}

//Calculates the daily energy intake to maintain weight, includes unit in result
function calcDailyCal(bmr, activity, calories) {
    var calpd = bmr * activityFactors[activity];
    
    if (calories) {
        return calpd.toFixed(2) + " Calories/day";
    }
    else {
        //Convert to kilojoules
        return (calpd * 4.184).toFixed(2) + " kilojoules/day";
    }
}