<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>BLOG</title>
    <style>
    
        body {
            color: white;
        }

    </style>
</head>
<body>


<h1>Welcome User</h1>

<?php
    session_start();

    
    if(!$_SESSION['user']) {
            header("location: ../index.php");
            exit();
    }

    echo "User: " . $_SESSION["name"] . "<br><br>";
?>

<div class="log_back">

    <button><a href="../Model/Logout_Model.php">Log out</button></a></p>

    <button><a href="FormBlog_View.php">Back</button></a></p>

</div>
    
<div class="gallery">

    <?php


        require_once('../Model/BlogObject_Model.php');

        require_once('../Model/Blog_Model.php');

        require_once('../Model/Person_Model.php');

        
    try {

        $BlogObject = new BlogObject_Model();

        $Blog_Id = new BlogObject_Model();

        $Blog_Table = $BlogObject->getContentsByDate();

        if(empty($Blog_Table)) {

            echo "There are no entries yet";

        } else {

            foreach($Blog_Table as $Item) {
                echo "<figure class='gallery_item'>";

                echo "<h3>" . $Item->getName() . "</h3>";

                echo "<h4>" . $Item->getDate() . "</h4>";

                echo "<div style='width:100px; height: 50px'>" . $Item->getComment() . "</div>";

                if($Item->getImage() != "") {

                    echo "<img src='../images/";

                    echo $Item->getImage() . "' width='300px' height='300px' name='gallery_img' />";

                }

                $id_photo = $Item->getId();

                $Blog_Id_Get = $Blog_Id->getUser($id_photo);

                //echo "<h4>Photo uploaded by " . getUser($id_photo) . "</h4>";
                echo "<h4>Photo uploaded by " . $Blog_Id_Get . "</h4>";

                echo "</figure>";
                //echo "<hr />";
            }
             
        }

    } catch (Exception $e) {

        die("Error ". $e->getMessage());

    }

    ?>

</div>


    <br />

    <a href="FormBlog_View.php">Volver a la página de insercción</a>

</body>
</html>