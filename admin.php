<?php
$connect= new mysqli('localhost','root','','mysql');
$result=$connect->query("select username,password from login");
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $user=$row["username"];
    }
}
if(isset($_COOKIE["controlhich"]))
{if($_COOKIE["controlhich"]=="1"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="pgprincipalstyle.css">
    <link rel="stylesheet" href="admin.css">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Espace Profeseur</title>
    <style>
        #icon{
            width: 30%;
            border-radius: 20px;
            border: 2px solid black;
            margin-left: 30%;
        }
    </style>
</head>
<body>
    <div id="first-container">
        <p id="nomprof"> <a href="about.php"><?php echo $user;?></a></p>
        <p id="matiere">SITE MATHÉMATIQUE</p>
        <a href="admin.php" style="text-decoration: none;"><p id="espace_prof"><?php if(isset($_COOKIE["controlhich"])){ if($_COOKIE["controlhich"]=="1"){echo "Gestionnaire";}} else{echo "Espace Prof"; }?></p></a>
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
    <p id="categ">Espace du professeur:</p>
    <hr style="width: 80%; align-content: center;"><br>
    <fieldset id="ajout" class="form_edit gestion">
        <legend id="titre_chapitre"></legend>
        <img src="Icon_login.jpg" id="icon">
        <form method="POST" action="update.php" enctype="multipart/form-data">
        <fieldset>
        <p>Nom du professeur:<input type="text" value="<?php echo $_COOKIE["useradmin"];?>" required="" name="nomprof"></p>
        <input type="text" style="display:none;"value="<?php echo $_COOKIE["useradmin"];?>" required="" name="oldnomprof">
        <p>Mdp actuel: <input type="password" placeholder="Ancien mot de passe" required="" name="oldpass"></p>
        <p>Nouveau Mdp: <input type="password" placeholder="Nouveau mot de passe"  name="newpass"></p>
        <p>confirmer le Mdp: <input type="password" placeholder="Nouveau mot de passe" name="newpassc"></p>
        <button id="btn_save" type="submit">Save</button></form>
        <form method="POST" action="reset.php" enctype="multipart/form-data" >
        <button id="btn_annule" type="submit">Reset</button>
        </form>
    </fieldset>
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
<?php
}

else{
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="loginstyle.css">
    <title>Login</title>
</head>
<body>
    <div id="plate_login">
        <img src="Icon_login.jpg" id="icon">
        <fieldset>
            <p id="titre">Espace Admin</p>
            <form method="POST" action="Connecter.php" enctype="multipart/form-data">
       <label for="username">Utilisateur :</label> <input  id="username" required="" type="text" name="username" >
       <br> <br> Mot de passe : <input type="password" id="password" required="" name="password"> <br> <br>
    <center><input type="submit" value="Connecter"></center></form>
        </fieldset>
    </div>
</body>
</html>
    <?php
}}
else{
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="loginstyle.css">
    <title>Login</title>
</head>
<body>
    <div id="plate_login">
        <img src="Icon_login.jpg" id="icon">
        <fieldset>
            <p id="titre">Espace Admin</p>
            <form method="POST" action="Connecter.php" enctype="multipart/form-data">
       <label for="username">Utilisateur :</label> <input  id="username" required="" type="text" name="username" >
       <br> <br> Mot de passe : <input type="password" id="password" required="" name="password"> <br> <br>
    <center><input type="submit" value="Connecter"></center></form>
        </fieldset>
    </div>
</body>
</html>
    <?php
}
?>