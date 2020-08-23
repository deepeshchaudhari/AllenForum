<!doctype html>
<html>
    <head>
        <title>Google reCAPTCHA demo</title>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <form method="post" action="index.php">
            <div class="g-recaptcha" data-sitekey="6LeYv1IUAAAAAEz_6b50h_Resc9clW8LyucWNJ1G"></div>
            <input type="submit" />
        </form>
    </body>
</html>

<?php

    
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        //form submitted

        //check if other form details are correct

        //verify captcha
        $recaptcha_secret = "6LeYv1IUAAAAACNoLld-NQ1dQMNwKIxrVA8DYB45";
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
        $response = json_decode($response, true);
        if($response["success"] === true)
        {
            echo "Logged In Successfully";
        }
        else
        {
            echo "You are a robot";
        }
    }