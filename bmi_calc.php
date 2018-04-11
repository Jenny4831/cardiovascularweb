<!DOCTYPE html>
<html>
    <head>
        <title>BMI - Beat It</title>
        
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
        <script src="js/bmi_calc.js"></script>
    </head>
    
    <body>
        <?php include 'header.php' ?>
        
        <section>
            <div class="content">
                <h1>BMI</h1>
                <h2>Assess your health</h2>
                <article>
                    <h3>About the BMI</h3>
                    <p>
                        The BMI is a rough indication of how healthy you are.
                        Use the calculator below to find information about your current BMI.
                    </p>
                </article>
                <article class="col-2">
                    <h3>Calculator</h3>
                    <form>
                        <label id="height_label" for="height_input">Height</label>
                        <div id="height_input"></div>
                        
                        <label id="weight_label" for="weight_input">Weight</label>
                        <div id="weight_input"></div>
                        
                        <input id="metric_radio" type="radio" name="unit" checked />
                        <label for="metric_radio">Metric</label>
                        <input id="imperial_radio" type="radio" name="unit" />
                        <label for="imperial_radio">Imperial</label>
                        <br/>
                        <input id="non_asian_radio" type="radio" name="ethnic" checked />
                        <label for="non_asian_radio">Non-Asian</label>
                        <input id="asian_radio" type="radio" name="ethnic" />
                        <label for="asian_radio">Asian</label>
                        <br/>
                        
                        <label id="bmi_label" for="bmi_input">BMI</label>
                        <div id="bmi_input"></div>
                    </form>
                </article>
                <article class="col-2">
                    <h3>Result</h3>
                    <p id="bmi_info"></p>
                                        
                    <input id="save_button" class="button" type="button" value="Save Details" disabled/>
                    <label id="save_result">Login to save your details for later</label>
                </article>
            </div>
        </section>
        
        <?php include 'footer.php' ?>
    </body>
</html>