<?php

$titre = $_POST["titre"];

unlink("ds/" . $_POST["titre"] . "/dv.pdf");
unlink("ds/" . $_POST["titre"] . "/crt.pdf");
$fil=scandir("ds/" . $_POST["titre"]);
rmdir("ds/" . $_POST["titre"] ."/" . $fil[2]);
rmdir("ds/" . $_POST["titre"]);

header("Location: " . $_SERVER["HTTP_REFERER"]);
?>