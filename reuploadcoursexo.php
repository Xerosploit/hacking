<?php

$titre = $_POST["titre"];

rename("coursexo/" . $_POST["oldtitre"],"coursexo/" . $_POST["titre"]);

$cour = $_FILES["cour"];
move_uploaded_file($cour["tmp_name"], "coursexo/" . $_POST["titre"] . "/cour.pdf");

$exo = $_FILES["exo"];
move_uploaded_file($exo["tmp_name"], "coursexo/" .  $_POST["titre"] . "/exo.pdf");

$jsf = $_FILES["jsf"];
move_uploaded_file($jsf["tmp_name"], "coursexo/" .  $_POST["titre"] . "/jsf.pdf");

header("Location: " . $_SERVER["HTTP_REFERER"]);
?>