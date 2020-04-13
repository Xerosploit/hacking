<?php

if($_POST["titre"]!="")
{
mkdir("ds/" . $_POST["titre"]);

$dv = $_FILES["dv"];
move_uploaded_file($dv["tmp_name"], "ds/" . $_POST["titre"] . "/dv.pdf");

$crt = $_FILES["crt"];
move_uploaded_file($crt["tmp_name"], "ds/" .  $_POST["titre"] . "/crt.pdf");

mkdir("ds/" . $_POST["titre"] . "/aelai" .date("d_m_y",strtotime($_POST["delai"])));
}
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>