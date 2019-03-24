<?php
    require("includes/classes/Header.php");

    $header = new Header("Lectures","lectures.css");
    $header->output();
?>

<body>
    <?php 
        include("includes/config.php"); 
        include("includes/components/navbar.php");

        // check if user is logged in
        if(!isset($_SESSION["userLoggedInName"])){
            header("Location: homepage.php");
        }
    ?>

    <div class="left">
        <!-- Course title -->
        <div class="title">
            <?php       
                // Fetch course title  
                $courseId = $_GET['id'];
                $courseIdQuery = "SELECT title FROM course WHERE id = '$courseId'"; 
                $courseIdResult = mysqli_query($con,$courseIdQuery);
                $course = mysqli_fetch_assoc($courseIdResult);

                echo "<h1 id='courseName'>". $course['title'] ."</h1>";
             ?>
        </div>



        <hr><br>
        <!-- video titles -->
        <div class="ui small divided vertical list">

            <?php 
                // Fetch all videos titles
                $courseId = $_GET['id'];
                $videosQuery = "SELECT * FROM videos WHERE courseId = '$courseId'";

                $videosResult = mysqli_query($con,$videosQuery);
                while($video = mysqli_fetch_assoc($videosResult)){
                    echo "<a class='item'>".$video['videoTitle'] . "</a>";
                }
            ?>
        </div>

    </div>

    <!-- Video -->
    <div class="right">
        <video src="" controls id="video">

        </video>
    </div>

    <!-- Clear float -->
    <div class="clearfix">
    </div>

    <?php 
        require("includes/classes/FooterLinks.php");

        $footerLinks = new FooterLinks("lectures.js");
        $footerLinks->output();
    ?>

</body>

</html>