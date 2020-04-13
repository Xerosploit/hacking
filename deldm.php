<?php
$connect= new mysqli('localhost','root','','mysql');
$titre = $_POST["titre"];
unlink("dm/" . $_POST["titre"] . "/dv.pdf");
unlink("dm/" . $_POST["titre"] . "/crt.pdf");
$fil=scandir("dm/" . $_POST["titre"]);

rmdir("dm/" . $_POST["titre"] ."/" . $fil[2]);

rmdir("dm/" . $_POST["titre"]);
$connect->query("DELETE FROM dm WHERE titre='".$_POST["titre"]."';");
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>