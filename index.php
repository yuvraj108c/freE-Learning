<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>freE-Learning</title>

    <!-- Website icon -->
    <link rel="icon" href="assets/images/icon.png" />

    <!-- Semantic ui cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" />

    <!-- Navbar -->
    <link rel="stylesheet" href="assets/css/nav.css">

    <!-- Login & register modal.css -->
    <link rel="stylesheet" href="assets/css/modals.css">

    <!-- Hero.css -->
    <link rel="stylesheet" href="assets/css/hero.css">

</head>
<body>
    <?php
        // Navbar
        include("includes/components/navbar.php");

        // Login Form
        include("includes/components/login-form.php");

        // Register form
        include("includes/components/register-form.php");   

    ?>

    <!-- Hero area -->
    <section id="heroArea">
        <div class="ui container">
            <div class="mainTitle">
                <h1><span>Free</span>&nbsp; Education for Everyone</h1>

                <div class="subTitle">
                    <span>Learn &nbsp;</span>
                    <span id="type-string"></span>
                </div>

                <!-- View courses btn -->
                <div class="button">
                    <a class="ui primary button" href="http://localhost/E-Learning-2/pages/courses.php">View Courses</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Semantic ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>

    <!-- Typed.js -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>

    <!-- Modals -->
    <script src="assets/js/modals.js"></script>

    <!-- Easy http -->
    <script src="assets/js/classes/easyhttp.js"></script>

    <!-- Homepage -->
    <script src="assets/js/homepage.js"></script>

    <!-- Register form -->
    <script src="assets/js/register-handler.js"></script>

    <!-- Recaptia.js -->
    <script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit'></script>
</body>
</html>