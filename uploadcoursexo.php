<?php
if($_POST["titre"]!="" )
{
	$titre = $_POST["titre"];

mkdir("coursexo/" . $_POST["titre"]);

$cour = $_FILES["cour"];
move_uploaded_file($_FILES["cour"]["tmp_name"], "coursexo/" . $_POST["titre"] . "/cour.pdf");

$exo = $_FILES["exo"];
move_uploaded_file($exo["tmp_name"], "coursexo/" .  $_POST["titre"] . "/exo.pdf");

$jsf = $_FILES["jsf"];
move_uploaded_file($jsf["tmp_name"], "coursexo/" .  $_POST["titre"] . "/jsf.pdf");
}
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>