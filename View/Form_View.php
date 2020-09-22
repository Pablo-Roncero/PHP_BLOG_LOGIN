<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
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
    
<form action="Model/Login_Model.php" method="post">
    
    <table>
    
        <tr>
            <td class="izq">Email:</td><td class="der"><input type="email" name="login" /></td>
        </tr>
    
        <tr>
            <td class="izq">Password:</td>
            <td class="der"><input type="password" name="password">
            </td>
        </tr>
    
        <tr><td colspan="2"><input type="submit" name="enviar" value="Log in"></td></tr>
    
    </table>
    
</form>

<?php




?>

</body>
</html>

