<!DOCTYPE html>
<html>
    <head>
        <title>Healthier You - Beat It</title>
        
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="js/cookie.js"></script>
        <script src="js/login.js"></script>
        <script src="js/navigation.js"></script>
    </head>
    
    <body>
        <?php include 'header.php' ?>
        
        <section>
            <div class="content">
                <h1>Healthier You</h1>
                <h2>Diet and Lifestyle</h2>
                <article>
                    <p>
                        Lifestyle changes play a major role in the prevention of cardiovascular diseases.<br/>
                        There are various factors involved in maintaining a healthy lifestyle.
                    </p>
                </article>
                <article class="article col-2">
                    <h3>Physical Activity</h3>
                    <p>Regular physical activity can lower many CVD risk factors such as high cholesterol, high blood pressure, 
                        and excess weight.
                    </p>
                    <p>
                        As little as 60 minutes of moderate intensity aerobic activity each week can provide health benefits.
                    </p>
                </article>
                <article class="article col-2">
                    <img class="content-image" src="image/running.png" />
                </article>
            </div>
            
            <div class="push"></div> <!--Allows gap between columns and banner-->
            
            <div class="banner" style="background-image: url(image/midBanner/food.png);">
                <div class="banner-heading">Healthy Eating</div>
                <div class="banner-body">A healthy diet is an important part of a healthy lifestyle</div>
            </div>
            
            <div class="content">
                <article class="article col-2">
                    <img class="content-image" src="image/vegetable.png" />
                </article>
                <article class="article col-2">
                    <h3>Diet</h3>
                    <p>
                        A healthy diet includes
                        <ul>
                            <li>a variety of vegetables and fruits</li>
                            <li>Whole grains</li>
                            <li>Dairy products</li>
                            <li>Lean meats</li>
                        </ul>
                    </p>
                    <p>
                        Foods with high salt content should be avoided as they can result in high blood pressure.
                    </p>
                    <p>
                        Visit our calorie calculator in order to gain an idea of how much you should be
                        eating in order to maintain your weight.
                    </p>
                    <p>
                        <a href="cal_calc.php">Calorie Calculator ></a>
                    </p>
                </article>
            </div>
            
            <div class="push"></div> <!--Allows gap between columns and banner-->
            
            <div class="content">
                <article class="article col-2">
                    <h3>Maintain Weight</h3>
                    <p>
                        Being overweight or obese is a major risk factor for CVD.
                    </p>
                    <p>
                        Your BMI is able to give an estimate of your total body fat.<br/>
                        Visit our calculator in order to learn more about your weight.
                    </p>
                    <p>
                        <a href="bmi_calc.php">BMI Calculator ></a>
                    </p>
                </article>
                <article class="article col-2">
                    <p>
                        <img class="content-image" src="image/calculator.png" />
                    </p>
                </article>
            </div>
            
            <div class="push"></div> <!--Allows gap between columns and banner-->
            

            
                <div class="banner" style="background-image: url(image/midBanner/jump.png);">
                <div class="banner-heading">Healthy</div>
                </div>
            
            
            
            <div class="content">
                <article class="article col-2">
                    <h3>Quit Smoking</h3>
                    <p>
                        Among other problems, smoking can raise your risk of CVD. If you smoke, you should try to quit.<b/>
                        There are programs available to help you quit. Talk with your doctor about your choices.
                    </p>
                    <p>
                        Secondhand smoke should also be avoided.
                    </p>
                </article>
                <!--<article class="article col-2">-->
                    
                <!--</article>-->
            </div>
        </section>
        
        <?php include 'footer.php' ?>
    </body>
</html>