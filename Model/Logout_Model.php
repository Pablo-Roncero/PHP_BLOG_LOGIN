<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        session_start();

        if($_COOKIE["user_email"]) {
                
            setcookie("user_email", $_POST["login"], time()-3600, "/");

            setcookie("user_password", $_POST["password"], time()-3600, "/");

        }

        unset($_SESSION["user"]);

        unset($_SESSION["password"]);

        session_destroy();
    
        header("location:../index.php");
    ?>

</body>
</html>