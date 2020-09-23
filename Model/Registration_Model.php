<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION</title>

    <style>

        h1 {
            text-align: center;
        }

        table {
            width: 25%;
            background-color: #FFC;
            border: 2px dotted #F00;
            margin: auto;
        }

        .izq {
            text-align: right;
        }

        .der {
            text-align: left;
        }

        td {   

            text-align: center;
            padding: 10px;
        }
    
    </style>
</head>
<body>
<?php

    require_once("Person_Model.php");

    require_once("PersonObject_Model.php");

    // First we check if the submit button was hit

    if (isset($_POST["submit"])) {

        try {

            // Now we create two objects, first one to set the values introduced by the user
            // second one to make the query to the database to introduce those values

            $user_register_object = new PersonObject_Model;
    
            $user_register_model = new Person_Model;

            // Here we get the data introduced by the user setting them into the object


            $user_register_object->setUserName($_POST["name"]);

            $user_register_object->setUserLastname($_POST["lastname"]);

            $user_register_object->setUserEmail($_POST["email"]);

            $user_register_object->setUserPassword($_POST["password"]);

            $user_register_object->setUserAge($_POST["age"]);

            // Now we use this object as a parameter to introduce data in our database

            $user_register_model->setUsers($user_register_object);
    
    
    
        } catch (Exception $e) {
    
            die ("Error: " . $e->getMessage() . " Line: " . $e->getLine());
    
        }

    }

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table>
    <tr>
        <td class="izq">Name:</td><td class="der"><input type="text" name="name" /></td>
    </tr>

    <tr>
        <td class="izq">Last name:</td>
        <td class="der"><input type="text" name="lastname">
        </td>
    </tr>

    
    <tr>
        <td class="izq">Email:</td>
        <td class="der"><input type="email" name="email">
        </td>
    </tr>

    
    <tr>
        <td class="izq">Password:</td>
        <td class="der"><input type="password" name="password">
        </td>
    </tr>

    
    <tr>
        <td class="izq">Age:</td>
        <td class="der"><input type="number" name="age">
        </td>
    </tr>

    <tr><td colspan="2"><input type="submit" name="submit" value="Submit"></td></tr>

    </table>
</form>
</body>
</html>