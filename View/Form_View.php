<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LOG IN</title>
    <style>

        table {
            width: 30%;
            margin: auto;
        }
    
    </style>
</head>
<body>

<h1>WELCOME TO OUR WEBSITE TO UPLOAD AND DISCOVER NEW PHOTOS</h1>
    
<form action="Model/Login_Model.php" method="post">
    
    <table>
    
        <tr>
            <td class="izq">Email</td><td class="der"><input type="email" name="login" /></td>
        </tr>
    
        <tr>
            <td class="izq">Password</td>
            <td class="der"><input type="password" name="password">
            </td>
        </tr>
    
        <tr><td><input type="checkbox" id="checkbox" name="checkbox">Remember me</td><td colspan="2"><input type="submit" name="enviar" value="Log in"></td></tr>
    
    </table>
    
</form>

<div class='register'>
    <h2>Do not forget to register if you have not yet in order to access to awesome content</h2>
    <button name="registration"><a name="button" href='Model/Registration_Model.php'>Registration</a></button>
</div>

</body>
</html>

