<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Error</title>
</head>
<body>

<div class="error_page">
    <ul>
        <?php
                
            echo "<li>The address introduced is not registered in our database</li>";

            echo "<li>Would you like to register?</li>";

            echo "<div><button class='button_failure_email' onclick='window.location.href= \"../Model/Registration_Model.php\" '>Yes</button></div>";

        ?>
    </ul>
</div>
</body>
</html>