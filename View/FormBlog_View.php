<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css">
<title>UPLOAD PHOTOS BLOG</title>
<style>

table{
  position: relative;
  bottom: 90px;
	width:50%;
	margin:auto;
	padding:5px;
	
}

</style>
</head>

<body>

<?php
    session_start();

    echo "User: " . $_SESSION["user"] . "<br><br>";
?>

<h2>New entry</h2>
<form action="../Controller/Blog_Controller.php" method="post" enctype="multipart/form-data" name="form1">
<table >
<tr>
  <td>Name 
    <label for="campo_titulo"></label></td>
  <td><input type="text" name="name_field" id="campo_titulo"></td>
  
  
  </tr>
  <tr><td>Comments 
    <label for="area_comentarios"></label></td>
    <td><textarea name="comment_field" id="area_comentarios" rows="10" cols="50"></textarea></td>
    </tr>
    <input type="hidden" name="MAX_TAM" value="2097152">
  <tr>
  <td colspan="2" align="center">Choose an image below 2 MB</td></tr>
  <tr>
    <td colspan="2" align="left"><input type="file" name="image_field" id="imagen"></td>
    </tr>
    <tr>
    <td colspan="2" align="center">  
    <input type="submit" name="submit_field" id="btn_enviar" value="Submit"></td></tr>
  <tr><td colspan="2" align="center"></td></tr>
  
  </table>
  <button class="blog"><a href="Blog_View.php">BLOG</a></button>
</form>
<p>&nbsp;</p>

</body>
</html>