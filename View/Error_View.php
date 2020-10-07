<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Error</title>
</head>
<body>

<div>
    <ul>
        <?php
                
            echo "<li>The address introduced is not registered in our database</li>";

            echo "<li>Would you like to register?</li>";

            echo "<div><button class='buttons_failure' onclick='window.location.href= \"../Model/Registration_Model.php\" '>Yes</button class='buttons_failure'><button>No</button></div>";

        ?>
    </ul>
</div>
</body>
</html>