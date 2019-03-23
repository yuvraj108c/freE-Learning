<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>

    <!-- Website icon -->
    <link rel="icon" href="assets/images/icon.png" />

    <!-- Semantic ui cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" />

    <!-- Navbar -->
    <link rel="stylesheet" href="assets/css/nav.css">

    <style>
    #adminpanel {
        margin-top: 5%;
    }

    #adminpanel h2 {
        /* text-align: center; */
    }

    .ui.divided.items {
        width: 70%;
        margin: 0 auto;
    }

    .ui.grid {
        width: 100%;
    }

    .item h3 {
        margin-top: 15px;
    }

    .item button.ui.button,
    div.button {
        margin-top: 10px;
    }
    </style>

</head>

<body>
    <?php
    include "includes/config.php";
    include "includes/components/navbar.php";

    // check if admin is logged in
        if(!isset($_SESSION["adminLoggedInName"])){
            header("Location: homepage.php");
        }

        if(isset($_GET["deleteid"])){
            $courseIdToDelete = $_GET["deleteid"];
        
            $courseNameResult = mysqli_query($con,"SELECT title FROM course WHERE id = '$courseIdToDelete'");
            $courseName = mysqli_fetch_assoc($courseNameResult)["title"];
            
            $deleteQueries = "";
            
            $videosQuery = "SELECT * FROM videos WHERE courseId = '$courseIdToDelete'";
            $videosResult = mysqli_query($con,$videosQuery);
            
            while ($video = mysqli_fetch_assoc($videosResult)) {
                $videoTitle = $video["videoTitle"];
            $deleteQueries .= "DELETE FROM videos WHERE courseId = '$courseIdToDelete' AND videoTitle = '$videoTitle';";
            
        }
        
        $deleteQueries .= "DELETE FROM enrolled WHERE courseId = '$courseIdToDelete';";
        $deleteQueries .= "DELETE FROM course WHERE id = '$courseIdToDelete';";
        
        $result = mysqli_multi_query($con,$deleteQueries);
        
        if(!$result){
            echo "Course not deleted";            
        }else{
            
            // Remove directory from xammp
            deleteAll("assets/courses/".$courseName);
            
            header("Refresh:0; url=adminpanel.php");
        }
    }

    function deleteAll($str) {
        //It it's a file.
        if (is_file($str)) {
            //Attempt to delete it.
            return unlink($str);
        }
        //If it's a directory.
        elseif (is_dir($str)) {
            //Get a list of the files in this directory.
            $scan = glob(rtrim($str,'/').'/*');
            //Loop through the list of files.
            foreach($scan as $index=>$path) {
                //Call our recursive function.
                deleteAll($path);
            }
            //Remove the directory itself.
            return @rmdir($str);
        }
    }
    ?>
    <section id="adminpanel">
        <div class="ui container">
            <div class="ui divided items">
                <h2>All courses</h2>

                <?php 
                $coursesResult = mysqli_query($con,"SELECT * FROM course");
                
                if($coursesResult){
                    
                    while($course = mysqli_fetch_assoc($coursesResult)){
                        echo 
                        "<div class='item'>
                        <div class='ui grid'>
                        <div class='two wide column '>
                        <div class='ui tiny image'>
                        <img src='assets/courses/".$course["title"]."/" .$course["title"].".jpg' alt=''>
                        </div>
                        </div>
                        <div class='eight wide column '>
                        <h3>".$course["title"]."</h3>
                        
                        </div>
                        <div class='two wide column '>
                        <div class='button'>
                        <a class='ui primary button' href='". ROOT_URL ."details.php?id=".$course["id"]."'>View</a>
                        </div>
                        </div>
                        <div class='two wide column '>
                        <form action='adminpanel.php' method='GET'>
                        <button class='ui red button' type='submit' name='deleteid' value='". $course["id"] ."'>Delete</button>
                        </form>
                        </div>
                        </div>
                        </div>";
                    }
                }
                
        ?>
            </div>
        </div>
    </section>



    <!-- Semantic ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>

    <script>
    $('.ui.dropdown').dropdown();
    </script>
</body>

</html>