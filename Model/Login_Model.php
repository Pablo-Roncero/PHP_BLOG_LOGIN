<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
<div class="failed_registration">
    <ul>

    <?php   

        //require_once("Connect_Model.php");
        require_once("Person_Model.php");

        require_once("PersonObject_Model.php");

        try {


            // Firs we create two objects to set the values introduced and retrieve the values from the database

            $user_check_object = new PersonObject_Model;

            $user_check_model = new Person_Model;
            
            $user_check_object->setUserEmail($_POST["login"]);

            $user_check_object->setUserPassword($_POST["password"]);

            $user_check_db = $user_check_model->checkUsers($user_check_object);

            // Once we have the data identified from the database we get the email and password

            $user_email_db = $user_check_db[0]["EMAIL"];


            $user_password_db = $user_check_db[0]["PASSWORD"];


            $user_name_db = $user_check_db[0]["NAME"];


            // Now we check whether the email and password match the ones in the database 

            if (!password_verify( $user_check_object->getUserPassword(), $user_password_db)) {

                echo "The password introduced is incorrect. Would you like to update it?";

                // Aquí habría que hacer una actualización de contraseña

                /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

                echo "<div><button class='buttons_failure' onclick='window.location.href= \"Registration_Model.php\" >Yes</button><button class='buttons_failure'>No</button></div>";

                //header("location: ../index.php");

            } else {
                // We are going to set a cookie to remember the user if the box is clicked

                session_start();

                if(isset($_POST["checkbox"])) {

                    setcookie("user_email", $_POST["login"], time()+86400, "/");

                    setcookie("user_password", $_POST["password"], time()+86400, "/");

                }

                $_SESSION["user"] = $user_email_db;

                $_SESSION["password"] = $user_password_db;

                $_SESSION["name"] = $user_name_db;

                //echo $_SESSION["name"];

                header("location: ../View/Blog_View.php");


            }

        } catch (Exception $e) {

            die ("Error: " . $e->getMessage() . " Line: " . $e->getLine());
        }

    ?>
    </ul>
</div>

</body>
</html>