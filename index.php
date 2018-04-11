<!DOCTYPE html>
<html>
    <head>
        <title>Beat It</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="js/plugin/youtubepopup.js"></script>
        
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link rel="stylesheet" type="text/css" href="css/home.css" />
        
        <script src="js/cookie.js"></script>
        <script src="js/login.js"></script>
        <script src="js/navigation.js"></script>
        <script src="js/home.js"></script>
        <script src="js/slider.js"></script>
    </head>
    
    <body>
        <?php include 'header.php' ?>
        
        <div id="home-banner">
            
                <div class="slider">
            	<img id="1" src="image/slider/slide_1_new.png" border="0" alt="slide1"/>
                <a href="cvd.php"><img id="2" src="image/slider/slide_2.png" border="0" alt="slide2"/></a>
                </div>

                <input id="video-button" class="button" type="button" value="Watch our video" />
                
                <div class="content">
                <div id="slideIcons">
                    <img id="prevIcon" onclick="prevButton();" src="image/slider/prev_icon.png" border="0" />
                    <img id="nextIcon" onclick="nextButton();" src="image/slider/next_icon.png" border="0"/>
                </div>
                </div>
                
                
            
                
        </div>
        
        
        <section>
            <div class="content">
                <h2>Cardiovascular Disease</h2>
                <article class="col-2">
                    <p>
                        This includes any disease of the heart and blood vessels.<br/>
                        CVD affects many people in Australia.
                    </p>
                    <p>
                        <a href="cvd.php">Learn more about CVD ></a>
                    </p>
                </article>
                
                <article class="col-2">
                    <p>
                        <img class="content-image" src="image/heart.png" />
                    </p>
                </article>
            </div>
            
            <div class="push"></div> <!--Allows gap between columns and banner-->
            
            <div class="banner" style="background-image: url(image/midBanner/food.png);">
                <div class="banner-heading">HEALTHIER LIFESTYLE, HEALTHIER YOU</div>
            </div>
            
            <div class="content">
                    <article class="col-2">
                            <p>
                                <img class="content-image" src="image/calculator.png" />
                            </p>
                    </article>
                    <article class="col-2">
                            <h3>Body Mass Index</h3>
                            <p>
                                Use our BMI calculator to learn more about your health.
                            </p>
                            <p>
                                <a href="bmi_calc.php">Go to the BMI calculator now ></a>
                            </p>
                            <h3>Calorie Intake</h3>
                            <p>
                                Use our Calorie calculator to learn more about your diet.
                            </p>
                            <p>
                                <a href="cal_calc.php">Go to the Calorie calculator now ></a>
                            </p>
                    </article>
            </div>
            <div class="push"></div>
            <div class="banner" style="background-image:url(image/midBanner/family.png);">
            </div>
                        
            <div class="content">
                    <article class="col-2">
                            <h3>Test your knowledge</h3>
                            <p>
                                Think you have a good understanding of cardiovascular disease and staying healthy?<br/>
                                Test your knowledge or try to beat your previous score.
                            </p>
                            <p>
                                <a href="quiz.php">Quiz ></a>
                            </p>
                    </article>
                    <article class="col-2">
                            <p>
                                <img class="content-image" src="image/quiz.png" />
                            </p>
                    </article>
            </div>
        </section>
        
        <?php include 'footer.php' ?>
    </body>
</html>