<!DOCTYPE html>
<html>
    <head>
        <title>Calorie Calculator - Beat It</title>
        
        <!--Load libraries-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        
        <script src="js/cookie.js"></script>
        <script src="js/login.js"></script>
        <script src="js/navigation.js"></script>
        <script src="js/calc.js"></script>
        <script src="js/cal_calc.js"></script>
    </head>
    
    <body>
        <?php include 'header.php' ?>
        
        <section>
            <div class="content">
                <h1>Calorie Calculator</h1>
                <h2>Plan your diet</h2>
                <article>
                    <h3>About the calculator</h3>
                    <p>
                        This calculator uses the Mifflin - St Jeor equation to estimate your <strong>Basal Metabolic Rate</strong>.
                        It can then be estimated, based on your activity level, how much energy you should consume in order to
                        maintain your weight.
                    </p>
                </article>
                <article class="col-2">
                    <h3>Calculator</h3>
                    <form>
                        <label id="height_label" for="height_input">Height</label>
                        <div id="height_input"></div>
                        
                        <label id="weight_label" for="weight_input">Weight</label>
                        <div id="weight_input"></div>
                        
                        <label id="age_label" for="age_input">Age</label>
                        <div id="age_input"></div>
                        
                        <input id="male_radio" type="radio" name="gender" checked />
                        <label for="male_radio">Male</label>
                        <input id="female_radio" type="radio" name="gender" />
                        <label for="female_radio">Female</label>
                        <br/>
                        <input id="metric_radio" type="radio" name="unit" checked />
                        <label for="metric_radio">Metric</label>
                        <input id="imperial_radio" type="radio" name="unit" />
                        <label for="imperial_radio">Imperial</label>
                    </form>
                </article>
                <article class="col-2">
                    <h3>Result</h3>
                    <input id="calorie_radio" type="radio" name="eunit" checked />
                    <label for="calorie_radio">Calories</label>
                    <input id="kilojoule_radio" type="radio" name="eunit" />
                    <label for="kilojoule_radio">Kilojoules</label>
                    <p id="bmr_result"></p>
                    
                    <label for="activity">Your activity:</label><br/>
                    <select name="activity" id="activity_selector">
                        <option>Not active</option>
                        <option>Somewhat active</option>
                        <option>Moderately active</option>
                        <option>Very active</option>
                        <option>Extremely active</option>
                    </select>
                    <p id="final_result"></p>
                    
                    <input id="save_button" class="button" type="button" value="Save Details" disabled/>
                    <label id="save_result">Login to save your details for later</label>
                </article>
            </div>
        </section>
        
        <?php include 'footer.php' ?>
    </body>
</html>