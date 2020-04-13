<?php
$connect= new mysqli('localhost','root','','mysql');
if($_POST["titre"]!="")
{
mkdir("dm/" . $_POST["titre"]);

$dv = $_FILES["dv"];
move_uploaded_file($dv["tmp_name"], "dm/" . $_POST["titre"] . "/dv.pdf");

$crt = $_FILES["crt"];
move_uploaded_file($crt["tmp_name"], "dm/" .  $_POST["titre"] . "/crt.pdf");

mkdir("dm/" . $_POST["titre"] . "/aelai" .date("d_m_y",strtotime($_POST["delai"])));

$connect->query("INSERT INTO dm VALUE('".$_POST["titre"]."','".$_POST["description"]."');");
}
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>