<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php   

        //require_once("Connect_Model.php");
        require_once("Person_Model.php");

        require_once("PersonObject_Model.php");

        try {

            // First we create two objects to set the values introduced and retrieve the values from the database

            $user_check_object = new PersonObject_Model;

            $user_check_model = new Person_Model;
            
            $user_check_object->setUserEmail($_POST["login"]);

            $user_check_object->setUserPassword($_POST["password"]);

            $user_check_db = $user_check_model->checkUsers($user_check_object);

            // Once we have the data identified from the database we get the email and password

            $user_email_db = $user_check_db[0]["EMAIL"];


            $user_password_db = $user_check_db[0]["PASSWORD"];

            // Now we check whether the email and password match the ones in the database 

            if (strcmp($user_email_db, $user_check_object->getUserEmail()) !== 0) {

                echo $user_email_db . " " . $user_password_db;

                echo "The email address introduced: " . $user_email_db . " is not recorded. Would you like to register?";

                echo "<div><button onclick='window.location.href= \"Registration_Model.php\" >Yes</button><button>No</button></div>";

            }

            if (strcmp($user_password_db, $user_check_object->getUserPassword()) !== 0) {

                echo "The password introduced is incorrect. Would you like to update it?";

                // Aquí habría que hacer una actualización de contraseña

                /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */

                echo "<div><button onclick='window.location.href= \"Registration_Model.php\" >Yes</button><button>No</button></div>";

                //header("location: ../index.php");

            }

            session_start();

            $_SESSION["user"] = $user_email_db;

            header("location: ../View/Blog_View.php");



        } catch (Exception $e) {

            die ("Error: " . $e->getMessage() . " Line: " . $e->getLine());
        }

    ?>

</body>
</html>