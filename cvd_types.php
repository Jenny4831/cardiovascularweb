<!DOCTYPE html>
<html>
    <head>
        <title>Types - Beat It</title>
        
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="js/cookie.js"></script>
        <script src="js/login.js"></script>
        <script src="js/navigation.js"></script>
        <script src="js/relateditems.js"></script>
    </head>
    
    <body>
        <?php include 'header.php' ?>
        
        <section>
            <div class="content">
                <h1>Cardiovascular Disease</h1>
                <h2>Types</h2>
                <article class="article col-2">
                    <h5 id="coronary"><strong>Coronary heart disease</strong></h5>
                    <p>Disease of the blood vessels supplying the heart muscle.</p>
                    <p>Major risk factors include</p>
                    <ul>
                        <li>High blood pressure or cholesterol</li>
                        <li>Tobacco use</li>
                        <li>Unhealthy diet and lack of physical activity</li>
                    </ul>
                    <p>Symptoms include</p>
                    <ul>
                        <li>Chest pain</li>
                        <li>Heart attack</li>
                    </ul>
                    
                    <h5 id="congenital"><strong>Congenital heart disease</strong></h5>
                    <p>Malformation of heart structures existing at birth.</p>
                    <p>These defects can occur between the left and right ventricles<br> which takes the form of a 'Ventricular Septal Defect' (VSD).<br> <br> Or  in the upper chambers (left and right atriums) otherwise<br> known as a 'Atrial Septal Defect' (ASD). </p>
                    <p>It may be caused by genetic factors or exposure during development such as</p>
                    <ul>
                        <li>Maternal alcohol and medicine use</li>
                        <li>Maternal infections such as rubella</li>
                        <li>Poor maternal nutrition</li>
                        <li>Close blood relationship between parents</li>
                    </ul>
                    <p>Symptoms of congenital heart diseases include</p>
                    <ul>
                        <li>Sweating</li>
                        <li>Fatigue</li>
                        <li>Rapid heart rate</li>
                        <li>Chest pain</li>
                    </ul>
                </article>
                <article class="col-2">
                    <p>
                        <img class="content-image" src="image/coronary.jpg" />
                    </p>
                    <h5 id="rheumatic"><strong>Rheumatic heart disease</strong></h5>
                    <p>Damage to the heart muscle and heart valves resulting from rheumatic fever.</p>
                    <p>This is caused by streptococcal bacteria.</p>
                </article>
                
            </div>
            
            <div class="push"></div> <!--Allows gap between columns and banner-->
            
            <div class="banner" style="background-image: url(image/midBanner/saltLandscape.jpg);">
                <!--<div class="banner-heading">Surgery may be required</div>-->
            </div>
            
            <div class="content">
                <article class="col-2">
                    <h5 id="aortic_aneurysm"><strong>Aortic aneurysm and dissection</strong></h5>
                    <p>Dilatation and rupture of the aorta.</p>
                    <p>Possible risk factors are</p>
                    <ul>
                        <li>Old age</li>
                        <li>High blood pressure</li>
                        <li>Infectious and inflammatory disorders</li>
                    </ul>
                    Symptoms include severe, sharp chest pains.
                    </p>

                    <h5><strong>Other cardiovascular diseases</strong></h5>
                    <ul>
                        <li>Heart tumours</li>
                        <li>Blood vessel tumours</li>
                        <li>Heart muscle disorders</li>
                    </ul>
                </article>
                <article id="col-2">
                    <h5 id="stroke"><strong>Strokes</strong></h5>
                    <p>Strokes are caused by disruption of the blood supply to the brain.</p>
                    <p>They may result from either blockage or rupture of a blood vessel.</p>
                    <p>Risk factors include</p>
                    <ul>
                        <li>High blood pressure or cholesterol</li>
                        <li>Tobacco use</li>
                        <li>Unhealthy diet and lack of physical activity</li>
                    </ul>
                </article>
            </div>
            
            <div class="content">
                
                <div id="related">
                    <h6><strong>Related Items</strong></h6>
                    
                    
                    <div class="relateditems" id="treatment">
                        <a style="display: none;" href="cvd_treatment.php"><p>Treatment</p></a>
                    </div>
                    <div class="relateditems" id="facts">
                        <a style="display:none"; href="cvd_facts.php"><p>Facts and Statistics</p></a>
                    </div>
                    <div class="relateditems" id="healthy">
                        <a style="display:none"; href="lifestyle.php"><p>Healthier you</p></a>
                    </div>
                </div>
            </div>
        </section>
        

        
            <!--<img src="image/space.jpg" width=250px height=100px class="relateditems"></a>-->
            <!--<a href="#" class="resources"> 
                <img src="image/heartGlass.jpg" width=250px height=100px class="relateditems"></a>
            <a href="#" class="resources">
                <img src="image/home_banner.jpg" width=250px height=100px class="relateditems"></img>
            </a>-->
        <?php include 'footer.php' ?>
    </body>
</html>