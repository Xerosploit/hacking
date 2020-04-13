<?php
$connect= new mysqli('localhost','root','','mysql');
$result=$connect->query("select username,password from login");
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $user=$row["username"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="pgprincipalstyle.css">
    <link rel="stylesheet" href="admin.css">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devoirs à Maison</title>
</head>
<body>
     <div id="first-container">
        <p id="nomprof"> <a href="about.php"><?php echo $user;?></a></p>
        <p id="matiere">SITE MATHÉMATIQUE</p>
        <a href="admin.php" style="text-decoration: none;"><p id="espace_prof"><?php if(isset($_COOKIE["controlhich"])){ if($_COOKIE["controlhich"]=="1"){echo "Gestionnaire";} else{echo "Espace Prof"; }} else{echo "Espace Prof"; }?></p></a>
    </div>
    <div class="container">
        <ul>
            <li id="menu"><a onclick="show_hid('menu_element',1)" href="#"><img id="menuic" src="menu.png">Menu: </a></li>
            <div id="menu_element">
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="cours_exercices_admin.php">Cours et exercices</a></li>
                <li class="devoirs">Devoirs
                  <ul>
                    <li><a href="Devoirs_Maison_admin.php">Devoirs a la maison</a></li>
                    <li><a href="Devoirs_sur_admin.php">Devoirs surveilles</a></li>
                  </ul>
                </li>
                <li> <a href="vide_classe.php">Vie de la classe</a></li>
                <li> <a href="article.php">Articles</a></li>
            </div>
        </ul>
    </div>
</div>
<div id="container_cours_exercices">
    <p id="categ">Devoirs Maison</p>
    <p id="intro"> Les devoirs  ci-dessous devant etre rendue avant le jeudi prochaine par exemple  </p><br> <br>
<?php
$files = scandir("dm");
for ($a = 2; $a < count($files); $a++)
{   
    $b=2;
    $chap = scandir("dm/" . $files[$a]);
    if(count($chap)>=3){
    ?>
        <hr style="width:80%; align-content:center;">
        <div id="image">
            <?php
            for($b=2;$b<count($chap);$b++)
            {
                if ($chap[$b]=="dv.pdf"){
                  ?>
                   <a  id="devoiric" href="dm/<?php echo $files[$a]; ?>/<?php echo $chap[$b]; ?>" download="dm/<?php echo $files[$a]; ?>/<?php echo $chap[$b]; ?>"><img src="devoir.png" id="icons"></a>
                   <?php
                }
                if ($chap[$b]=="crt.pdf"){
                  ?>
                   <a  id="correctic" href="dm/<?php echo $files[$a]; ?>/<?php echo $chap[$b]; ?>" download="dm/<?php echo $files[$a]; ?>/<?php echo $chap[$b]; ?>"><img src="correct.png" class="exoss" id="icons"></a>
                   <?php 
                }
            }
                ?>
        </div>
        <p id="titre"><?php echo $files[$a]." avant ".$chap[2][5].$chap[2][6]."/".$chap[2][8].$chap[2][9]."/".$chap[2][11].$chap[2][12]; ?><button id="btn_edit" onclick="show('chapitre<?php echo $a-1 ?>');"><?php if(isset($_COOKIE["controlhich"])){ if($_COOKIE["controlhich"]=="1"){echo "Modifier";}else{echo "Plus"; }} else{echo "Plus"; }?></button> </p>
    <fieldset id="chapitre<?php echo $a-1 ?>" class="form_edit">
        <legend id="titre_chapitre"></legend>
        <div style="display:<?php if(isset($_COOKIE["controlhich"])){ if($_COOKIE["controlhich"]=="1"){echo "initial;";}else{echo "none;"; }} else{echo "none;"; }?>">
            <form method="POST" action="reuploaddm.php" enctype="multipart/form-data">
            <p>Titre: <input  type="text" name="titre" value="<?php echo $files[$a]; ?>"></p>
            <p style="display:none;">Titre: <input  type="text" name="oldtitre"value="<?php echo $files[$a]; ?>"></p>
            <p style="display:none;">Titre: <input  type="text" name="olddelai"value="<?php echo $chap[2][5].$chap[2][6]."_".$chap[2][8].$chap[2][9]."_".$chap[2][11].$chap[2][12]; ?>"></p>
            <p>Delai: <input type="date" value="<?php echo $chap[2][5].$chap[2][6]."/".$chap[2][8].$chap[2][9]."/".$chap[2][11].$chap[2][12]; ?>" required="le delai du devoir" name="delai"></p>
            <p>DEVOIR: <input type="file" accept=".pdf" name="dv"></p>
            <p>Correction: <input type="file" accept=".pdf" name="crt"></p>
            <p>Description: <textarea name="description" placeholder="<?php

                $result=$connect->query("select titre,description from dm");
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        if($row["titre"]==$files[$a])
                        {
                            echo $row["description"];
                        }
                    }
                }

             ?>"></textarea></p>
            <button id="btn_save" type="submit">Save</button></form>
            <form method="POST" action="deldm.php" enctype="multipart/form-data">
            <input type="text" style="display:none;" name="titre" value="<?php echo $files[$a]; ?>">
            <button id="btn_supp" type="submit">Supprimer</button></form>
        </div>
        <div style="display:<?php if(isset($_COOKIE["controlhich"])){ if(!$_COOKIE["controlhich"]=="1"){echo "initial;";}else{echo "none;"; }} else{echo "initial;"; }?>">
            <p style=""><?php
                $result=$connect->query("select titre,description from dm");
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        if($row["titre"]==$files[$a])
                        {
                            echo $row["description"];
                        }
                    }
                }
             ?></p>
        </div>
            <button onclick="annule('chapitre<?php echo $a-1 ?>');" id="btn_annule">Annule</button>
    </fieldset>
    <?php
}
}
?>
    <hr style="width: 80%; align-content: center;"><br><br>
    <div style="visibility:<?php if(isset($_COOKIE["controlhich"])){ if($_COOKIE["controlhich"]=="1"){echo "visible;";}else{echo "hidden;"; }} else{echo "hidden;"; }?>">
    <p id="guide">===>Creation d'un nouveau devoir: <button id="btn_edit" onclick="show('ajout');">Créer</button> </p>
    <fieldset id="ajout" class="form_edit">
        <legend id="titre_chapitre"></legend>
        <form method="POST" action="uploaddm.php" enctype="multipart/form-data">
        <p>Titre: <input type="text" name="titre"></p>
        <p>Delai: <input type="date" required="le delai du devoir" name="delai"></p>
        <p>DEVOIR: <input required="" accept=".pdf" type="file" name="dv"></p>
        <p>Correction: <input type="file" accept=".pdf" name="crt"></p>
        <p>Description: <textarea required="" name="description" placeholder="entrer Email de reception de devoir ou des conseil suplementaire"></textarea></p>
        <button id="btn_save" type="submit">Save</button></form>
        <button onclick="annule('ajout');" id="btn_annule">Annule</button>  
    </fieldset></div>
</div>
</div>
<script>
        var state_menu=0;
        isMobile();
        function isMobile()
        {
            var x=(document.body.clientWidth);
            if(x<320 && state_menu==0){
                document.getElementById('menu_element').style.display="none";
                document.getElementById('menu').style.marginLeft="34%";
            }
            else{
                document.getElementById('menu').style.marginLeft="0%";
                document.getElementById('menu_element').style.display="block";
            }
            setTimeout(isMobile,1000);
        }
        function show_hid(id,)
        {
            if(state_menu==0){document.getElementById(id).style.display="block";state_menu=1;}
            else{document.getElementById(id).style.display="none";state_menu=0;}
        }
    function show(chapitre) {
        var x=document.getElementById(chapitre);
        x.style.display="initial";
    }
    function annule(chapitre)
    {
        var x=document.getElementById(chapitre);
        x.style.display="none";
    }
</script>
</body>
</html>