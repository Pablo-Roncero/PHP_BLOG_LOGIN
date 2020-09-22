<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    if(isset($_COOKIE["idioma_seleccionado"])) {

        if($_COOKIE["idioma_seleccionado"]=="es") {
            header("location:spanish.php");
        }   else if($_COOKIE["idioma_seleccionado"]=="en") {
            header("location:english.php");
        }

    }

?>
    
    <h1 align="center">Elige un idioma</h1>
    <table align="center">
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td><a href="crea_cookie.php?idioma=es"><img src="th.jpg" witdh="200" height="200" alt=""></a></td>
            <td><a href="crea_cookie.php?idioma=en"><img src="eng.jpg" witdh="200" height="200" alt=""></a></td>
        </tr>

    </table>

</body>
</html>