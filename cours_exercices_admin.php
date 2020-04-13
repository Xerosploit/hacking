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
    <title>Cours et Exercices</title>
</head>
<body>
     <div id="first-container">
        <p id="nomprof"> <a href="about.php"><?php echo $user;?></a></p>
        <p id="matiere">SITE MATHÉMATIQUE</p>
        <a href="admin.php" style="text-decoration: none;"><p id="espace_prof"><?php if(isset($_COOKIE["controlhich"])){ if($_COOKIE["controlhich"]=="1"){echo "Gestionnaire";}else{echo "Espace Prof"; }} else{echo "Espace Prof"; }?></p></a>
    </div>
    <div class="container">
        <ul>
            <li id="menu"><a onclick="show_hid('menu_element',1)" href="#"><img id="menuic" src="menu.png">Menu: </a></li>
            <div id="menu_element">
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="cours_exercices_admin.php">Cours et exercices </a></li>
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
    <p id="categ">Cours et exercices</p>
    <p id="intro"> Les documents ci-dessous sont conformes aux programmes actuels de la filière informatique est une 
    belle filiere  </p><br><br>
<?php
$files = scandir("coursexo");
for ($a = 2; $a < count($files); $a++)
{   

    $b=2;
    $chap = scandir("coursexo/" . $files[$a]);
    if(count($chap)!=2){
    ?>
        <hr style="width:80%; align-content:center;">
        <div id="image">
            <?php
            for($b=2;$b<count($chap);$b++)
            {
                if ($chap[$b]=="cour.pdf"){
                  ?>
                   <a  id="coursic" href="coursexo/<?php echo $files[$a]; ?>/<?php echo $chap[$b]; ?>" download="coursexo/<?php echo $files[$a]; ?>/<?php echo $chap[$b]; ?>"><img src="cours.png" id="icons"></a>
                   <?php
                }
                if ($chap[$b]=="exo.pdf"){
                  ?>
                   <a  id="exosic" href="coursexo/<?php echo $files[$a]; ?>/<?php echo $chap[$b]; ?>" download="coursexo/<?php echo $files[$a]; ?>/<?php echo $chap[$b]; ?>"><img src="exos.png" class="exoss" id="icons"></a>
                   <?php 
                }
                if ($chap[$b]=="jsf.pdf"){
                  ?>
                  <a  id="jsfic" href="coursexo/<?php echo $files[$a]; ?>/<?php echo $chap[$b]; ?>" download="coursexo/<?php echo $files[$a]; ?>/<?php echo $chap[$b]; ?>"><img src="jsf.png" class="jsff" id="icons"></a>
                  <?php 
                }
            }
                ?>
        </div>
        <p id="titre"><?php echo $files[$a]; ?><button style="visibility:<?php if(isset($_COOKIE["controlhich"])){ if($_COOKIE["controlhich"]=="1"){echo "visible;";}else{echo "hidden;"; }} else{echo "hidden;"; }?>" id="btn_edit" onclick="show('chapitre<?php echo $a-1 ?>');">Modifier</button> </p>
    <fieldset style="visibility:<?php if(isset($_COOKIE["controlhich"])){ if($_COOKIE["controlhich"]=="1"){echo "visible;";}else{echo "hidden;"; }} else{echo "hidden;"; }?>" id="chapitre<?php echo $a-1 ?>" class="form_edit">
        <legend id="titre_chapitre"></legend>
        <form method="POST" action="reuploadcoursexo.php" enctype="multipart/form-data">
            <p>Titre: <input  type="text" name="titre"value="<?php echo $files[$a]; ?>"></p>
            <p style="display:none;">Titre: <input  type="text" name="oldtitre"value="<?php echo $files[$a]; ?>"></p>
            <p>Cour: <input type="file" name="cour" accept=".pdf"></p>
            <p>Exo: <input type="file" name="exo" accept=".pdf" ></p>
            <p>JSF: <input type="file" name="jsf" accept=".pdf" ></p>
            <button id="btn_save" type="submit">Save</button>
            </form>
            <form method="POST" action="delcoursexo.php" enctype="multipart/form-data">
            <input type="text" style="display:none;" name="titre" value="<?php echo $files[$a]; ?>">
            <button id="btn_supp" type="submit">Supprimer</button></form>
        <button onclick="annule('chapitre<?php echo $a-1 ?>');" id="btn_annule">Annule</button>
    </fieldset>
    <?php
}

if(count($chap)==2)
{
    rmdir("coursexo/" . $files[$a]);
}
}
?>
    <hr style="width: 80%; align-content: center;"><br><br>
    <div style="visibility:<?php if(isset($_COOKIE["controlhich"])){ if($_COOKIE["controlhich"]=="1"){echo "visible;";}else{echo "hidden;"; }} else{echo "hidden;"; }?>"><p id="guide">===>Creation d'un nouveau chapitre: <button id="btn_edit" onclick="show('ajout');">Créer</button> </p>
    <fieldset id="ajout" class="form_edit">
        <legend id="titre_chapitre"></legend>
        <form method="POST" action="uploadcoursexo.php" enctype="multipart/form-data">
        <p>Titre: <input type="text" required="" name="titre"></p>
        <label style="color: red; font-size: 15px; margin:0px;">*Entrer au moins l'un de ces champs:</label>
        <p>Cour: <input type="file" accept=".pdf" name="cour"></p>
        <p>Exo: <input type="file" accept=".pdf" name="exo"></p>
        <p>JSF: <input type="file" accept=".pdf" name="jsf"></p>
        <button id="btn_save" type="submit">Save</button>
        <button onclick="annule('ajout');" id="btn_annule">Annule</button>
    </form>
    </fieldset></div>
</div>
<script>
        var state_menu=0;
        isMobile();
        function isMobile()
        {
            var x=(document.body.clientWidth);
            if(x<480 && state_menu==0){
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