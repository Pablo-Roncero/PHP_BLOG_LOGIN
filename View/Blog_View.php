<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG</title>
</head>
<body>


<h1>Welcome User</h1>

<?php
    session_start();

    echo "User: " . $_SESSION["user"] . "<br><br>";
?>

<p><a href="../Model/Logout_Model.php">Log out</a></p>

<p>This part is only available for registered users</p>

<p><a href="Blog_View.php">Volver</a></p>
    

    <?php


        require_once('../Model/BlogObject_Model.php');

        require_once('../Model/Blog_Model.php');
        
    try {

        $BlogObject = new BlogObject_Model();

        $Blog_Table = $BlogObject->getContentsByDate();

        if(empty($Blog_Table)) {

            echo "There are no entries yet";

        } else {

            foreach($Blog_Table as $Item) {
                echo "<h3>" . $Item->getName() . "</h3>";

                echo "<h4>" . $Item->getDate() . "</h4>";

                echo "<div style='width:400px'>" . $Item->getComment() . "</div>";

                if($Item->getImage() != "") {

                    echo "<img src='../images/";

                    echo $Item->getImage() . "' width='300px' height='200px' />";

                }

                echo "<hr />";
            }
             
        }

    } catch (Exception $e) {

        die("Error ". $e->getMessage());

    }

    ?>

    <br />

    <a href="FormBlog_View.php">Volver a la página de insercción</a>

</body>
</html>