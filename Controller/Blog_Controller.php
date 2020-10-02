<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
<div class="uploaded_photo">

<?php

    require_once("../Model/Blog_Model.php");

    require_once("../Model/BlogObject_Model.php");

    
    $BlogObject = new BlogObject_Model();

    $Blog = new Blog_Model();

    try {

        if ($_FILES["image_field"]["error"]) {

            switch($_FILES["image_field"]["error"]) {

                case 1:  // File size in php.ini was bigger than the one allowed

                    echo "File size exceeds the one allowed by server";

                    break;

                case 2:  // File size error already inidcated in the form

                    echo "File size exceeds 2MB";

                    break;

                case 3:  // File corrupted

                    echo "File delivery was interrupted";

                    break;

                case 4:  // No file

                    echo "File not delivered";

                    break;

            }

        } else {
            echo "<h1>A NEW ENTRY HAS BEEN ADDED!</h1>
                <ul></br>";

            if((isset($_FILES["image_field"]["name"]) && ($_FILES["image_field"]["error"]==UPLOAD_ERR_OK))) {

                $route_destination = "../images/";

                move_uploaded_file($_FILES["image_field"]["tmp_name"], $route_destination . $_FILES["image_field"]["name"]);

                echo "<li>File " . $_FILES["image_field"]["name"] . " was correctly copied at the images directory</li>";

            } else {

                echo "File was unable to be copied at the images directory";
            }
        }


        $Blog->setName(htmlentities(addslashes($_POST["name_field"]), ENT_QUOTES));

        $Blog->setDate(Date("Y-m-d H:i:s"));

        $Blog->setComment(htmlentities(addslashes($_POST["comment_field"]), ENT_QUOTES));

        $Blog->setImage($_FILES["image_field"]["name"]);


        $BlogObject->insertContent($Blog);

        echo "<li>New blog entry added successfully</li> </br>";

    } catch (Exception $e) {

        die("Error ". $e->getMessage() . $e->getLine());

    }

?>
    </ul>
</div>
<div class="buttons_uploaded">
    <button><a href="../View/Blog_View.php">Blog</a></button>
    <button><a href="../View/FormBlog_View.php">New Entry</a></button>
</div>
</body>
</html>