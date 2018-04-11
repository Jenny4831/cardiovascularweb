<!DOCTYPE html>
<html>
    <head>
        <title>Register - Beat It</title>
        
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="js/cookie.js"></script>
        <script src="js/login.js"></script>
        <script src="js/navigation.js"></script>
        <script src="js/register.js"></script>
    </head>
    
    <body>
        <?php include 'header.php' ?>
        
        <section>
            <div class="content">
                <h1>REGISTER</h1>
                <article class="col-3-2">
                    <h3>Why register?</h3>
                    <p>Register now to customise your experience at Beat It!</p>
                </article>
                <article class="form-area col-3">
                    <h3>Register</h3>
                    <form id="register_form">
                            <input id="first_name" class="text-input" type="text" name="firstName" placeholder="First Name" />
                            <br/>
                            <input id="last_name" class="text-input" type="text" name="lastName" placeholder="Last Name" />
                            <br/>
                            <input id="email" class="text-input" type="email" name="email" placeholder="Email Address" />
                            <br/>
                            <input id="male_radio" type="radio" name="gender" value="male" checked />
                            <label for="male_radio">Male</label>
                            <input id="female_radio" type="radio" name="gender" value="female" />
                            <label for="female_radio">Female</label>
                            <br/>
                            <input id="register_username" class="text-input" class="text-input" type="text" name="username" placeholder="Username" />
                            <br/>
                            <input id="register_password" class="text-input" type="password" name="password" placeholder="Password" />
                            <br/>
                            <label id="register_error" class="error"></label>
                            <input id="register_button" class="button" type="submit" name="register" value="Register">
                    </form>
                </article>
            </div>
        </section>
        
        <?php include 'footer.php' ?>
    </body>
</html>