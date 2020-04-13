<?php

$username=$_POST["username"];
$password=$_POST["password"];


$connect= new mysqli('localhost','root','','mysql');
$result=$connect->query("select username,password from login");

if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$user=$row["username"];
		$pass=$row["password"];
		setcookie("useradmin",$user);
	}
}

if ($password==$pass){
	setcookie("controlhich","1");
	header("Location: cours_exercices_admin.php");
}
else{
	?>
	<script>
		alert("username or password is incorrect, try again");
	</script>
<?php
	}
?>