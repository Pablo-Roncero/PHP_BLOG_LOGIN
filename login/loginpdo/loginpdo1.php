<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <h1>INTRODUCE TUS DATOS</h1>
    
    <form action="compruebaloginpdo.php" method="post">
    
        <table>
        
            <tr>
                <td class="izq">Login:</td><td class="der"><input type="text" name="login" /></td>
            </tr>

            <tr>
                <td class="izq">Password:</td>
                <td class="der"><input type="password" name="password">
                </td>
            </tr>

            <tr><td colspan="2"><input type="submit" name="enviar" value="login"></td></tr>

        </table>

    </form>

</body>
</html>