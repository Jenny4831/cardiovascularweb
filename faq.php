<!DOCTYPE html>
<html>
    <head>
        <title>FAQ - Beat It</title>
        
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
                <h1>FAQ</h1>
                <article>
                    <h3>Some frequently asked questions</h3>
                    <ul class="content-list">
                        <li><a class="anchor-link" href="#faq_register">How can I create an account?</a></li>
                        <li><a class="anchor-link" href="#faq_reset">I forgot my password, how can I reset my password?</a></span></li>
                        <li><a class="anchor-link" href="#faq_contact">How can I contact you?</a></li>
                        <li><a class="anchor-link" href="#faq_info">Where can I get more information about cardiovascular disease?</a></li>
                        <li><a class="anchor-link" href="#faq_bmi">How can I use the BMI calculator?</a></li>
                    </ul>
                </article>
                <article>
                    <a class="anchor-target" name="faq_register"><h4>How can I create an account?</h4></a>
                    <p>
                        To create an account, press the user button at the top of any page and press <strong>register</strong>.<br/>
                        Alternatively, press the link below<br/>
                        <a href="register.php">Register now ></a>
                    </p>
                    <a class="anchor-target" name="faq_reset"><h4>I have forgotten my password. What should I do?</h4></a>
                    <p>
                        If you have forgotten your password, please email us at <a href="mailto:help@beatit.com.au">help@beatit.com.au</a> and
                        we will try to help you in regaining access to your account.
                    </p>
                    <a class="anchor-target" name="faq_contact"><h4>How can I contact you?</h4></a>
                    <p>
                        Our contact details are provided on the contact page.
                        Press the link below to go there.<br/>
                        <a href="contact.php">Contact Us ></a>
                    </p>
                    <a class="anchor-target" name="faq_info"><h4>Where can I get more information about cardiovascular disease?</h4></a>
                    <p>
                        We provide resources where you can find more information on the resources page.<br/>
                        <a href="resources.php">Resources ></a>
                    </p>
                    <a class="anchor-target" name="faq_bmi"><h4>How can I use the BMI calculator?</h4></a>
                    <p>
                        To use the BMI calculator, you will need to know your current height and weight.<br/>
                        Once you have this information, visit our website to calculate your Body Mass Index.<br/>
                        More information is provided on the BMI calculator page, such as how you can use the information
                        provided by the calculator.<br/>
                        <a href="bmi_calc.php">BMI Calculator ></a>
                    </p>
                    <a href="#">Go to top</a>
                </article>
            </div>
        </section>
        <?php include 'footer.php' ?>
</body>
</html>