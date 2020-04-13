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
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $name=scandir("../."); echo $name[2];?></title>
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
<div id="container_principal">
    <p style="color: rgb(42, 110, 42); font-size: 45px; margin-top: 2px;margin-bottom: 0px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">BIENVENUE !</p>
    <p>J’enseigne les mathématiques dans la classe préparatoire <strong>MPSI 3</strong> du <strong>lycée Saint-Louis</strong> de Paris. Vous trouverez sur ces pages au format PDF la plupart des documents que je distribue à mes étudiants.</p>
    <p style="color: rgb(42, 110, 42); font-size: 25px; margin-bottom: 0px; margin-top: 12px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">(RE)NOUVEAU !</p>
    <p>Si vous ne le connaissiez pas, le site <a href="prepas.org">prepas.org</a> fait peau neuve et je vous invite à le (re)découvrir. Que vous soyez au lycée ou déjà en prépa, ce site a été pensé pour vous, profitez-en !		
        Vous pouvez m’écrire à l’adresse suivante: <strong>christophebertault@gmail.com</strong>  </p>
    
    <p style="color: rgb(109, 179, 179);">J’autorise quiconque le souhaite à placer sur son site un lien vers mes documents, mais je n’autorise personne à les héberger directement. J’interdis par ailleurs toute utilisation commerciale de mon travail.</p>
    <p style="color: red;">Il est inutile en revanche de m’écrire pour me demander des documents que je ne publie pas sur mon site, des cours particuliers ou des conseils méthodologiques.</p>J’autorise quiconque le souhaite à placer sur son site un lien vers mes documents, mais je n’autorise personne à les héberger directement. J’interdis par ailleurs toute utilisation commerciale de mon travail.
    Il est inutile en revanche de m’écrire pour me demander des documents que je ne publie pas sur mon site, des cours particuliers ou des conseils méthodologiques.</div>
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
    </script>
</body>
</html>