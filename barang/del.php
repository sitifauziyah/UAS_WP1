<?php
include_once("../_header.php"); ?>
<?php
$id = $_GET["id"];
$result = mysqli_query($connect, "DELETE FROM users WHERE id=$id");
header("location:fetch.php");
?>
<?php
include_once("../_footer.php"); ?>