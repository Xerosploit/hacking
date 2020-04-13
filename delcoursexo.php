<?php

$titre = $_POST["titre"];

unlink("coursexo/" . $_POST["titre"] . "/cour.pdf");
unlink("coursexo/" . $_POST["titre"] . "/exo.pdf");
unlink("coursexo/" . $_POST["titre"] . "/jsf.pdf");
rmdir("coursexo/" . $_POST["titre"]);

header("Location: " . $_SERVER["HTTP_REFERER"]);
?>