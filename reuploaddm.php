<?php
$connect= new mysqli('localhost','root','','mysql');
rename("dm/" . $_POST["oldtitre"],"dm/" . $_POST["titre"]);

$dv = $_FILES["dv"];
move_uploaded_file($dv["tmp_name"], "dm/" . $_POST["titre"] . "/dv.pdf");

$crt = $_FILES["crt"];
move_uploaded_file($crt["tmp_name"], "dm/" .  $_POST["titre"] . "/crt.pdf");

rmdir("dm/" . $_POST["titre"] . "/aelai" .$_POST["olddelai"]);
mkdir("dm/" . $_POST["titre"] . "/aelai" .date("d_m_y",strtotime($_POST["delai"])));

$connect->query("UPDATE dm SET description='".$_POST["description"]."' WHERE titre='".$_POST["titre"]."';");

header("Location: " . $_SERVER["HTTP_REFERER"]);
?>