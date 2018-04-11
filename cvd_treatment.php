<!DOCTYPE html>
<html>
    <head>
        <title>Treatment - Beat It</title>
        
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
                <h2>Treatment</h2>
               
                <article class="col-2">
                       
                    <h4><strong>Medicines</strong></h4>
        
                    <p>You may need medicines to treat CVD if lifestyle changes aren't enough. Medicines can help to:</p>
                    
                    <ul>
                        <li>Reduce your heart's workload</li>
                        <li>Decrease your chance of heart attack and death</li>
                        <li>Lower your cholesterol, blood pressure, and other factors that can result in CVD</li>
                        <li>Prevent blood clots</li>
                        <li>Prevent or delay the need for surgery</li>
                    </ul>
                    
                </article>
                
                <article class="col-2">
                    <p>
                        <img class="content-image" src="image/medicine.jpg" />
                    </p>
                </article>
                
            </div>
            
            <div class="push"></div> <!--Allows gap between columns and banner-->
            
            <div class="banner" style="background-image: url(image/midBanner/stethoscope.jpg);">
                <!--<div class="banner-heading">Surgery may be required</div>-->
            </div>
            
            <div class="content">
                
                <article>
                               
                    <h4><strong>Procedures and surgeries</strong></h4>
                    <ul>
                        <li><strong>Percutaneous Coronary Intervention (PCI)</strong> is a nonsurgical procedure that opens blocked or narrowed coronary arteries.
                            PCI can improve blood flow to your heart and relieve chest pain. A small mesh tube called a stent usually is placed in 
                            the artery to help keep it open after the procedure.</li>
                        <li><strong>Coronary Artery Bypass Grafting</strong> is a type of surgery where a surgeon removes arteries or veins 
                            from other areas in your body and uses them to bypass narrowed or blocked coronary arteries. It 
                            can improve blood flow to your heart, relieve chest pain, and possibly prevent a heart attack.</li>
                        <li><strong>Cardiac Rehabilitation</strong> is a medically supervised program that can improve the health and well-being of 
                            people who have heart problems.</li>
                    </ul>

                </article>
                
                <div id="related">
                    <h6><strong>Related Items</strong></h6>
                    
                    
                    <div class="relateditems" id="type">
                        <a style="display: none;" href="cvd_types.php"><p>Types</p></a>
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
        
        <?php include 'footer.php' ?>
    </body>
</html>