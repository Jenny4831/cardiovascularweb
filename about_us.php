<!DOCTYPE <!DOCTYPE html>
<html>
    <head>
        <title>About Us - Beat It</title>
             <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugin/youtubepopup.js"></script>
        
        <script src="js/cookie.js"></script>
        <script src="js/login.js"></script>
        <script src="js/navigation.js"></script>
    </head>
    <body>
        <?php include 'header.php' ?>
        
        <section>
            <div class="content">
                <h1>ABOUT US</h1>
                <article class="col-2">
                    <h3>Our Purpose</h3>
                    <p>
                        Our aim is to increase awareness of cardiovascular diseases.
                    </p>
                    <p>
                        Made as part of a university project at The University of Sydney, <strong>Beat It</strong> continues to keep
                        people informed with the details of cardiovascular disease and the need for a healthy lifestyle.
                    </p>
                    <input id="video-button" class="button" type="button" value="Watch our video" />
                    <script>
                        $("#video-button").YouTubePopup({ youtubeId: 'P7RqewA5KWM', title: 'Beat It', clickOutsideClose: true, showBorder: false});
                    </script>
                </article>
                <article class="col-2">
                    <h3>Our Team</h3>
                    <ul>
                        <li><strong>Daniel (dmcm0887)</strong> - HTML, CSS, JavaScript, Database</li>
                        <li><strong>Asim (asae6475)</strong> - Photoshop, HTML, CSS, Javascript</li>
                        <li><strong>Jenny (nzhe4831)</strong> - Photoshop, Web Design</li>
                        <li><strong>Karen (kche4101)</strong> - Content and page layout design</li>
                        <li><strong>Chad (jzha8758)</strong> - Interactive design, Video Content</li>
                    </ul>
                </article>
            </div>
        </section>

        <?php include 'footer.php' ?>
    </body>
</html>