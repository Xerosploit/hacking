<?php 

$name=scandir("../.");

$oldpass=$_POST["oldpass"];
$newpass=$_POST["newpass"];
$newpassc=$_POST["newpassc"];

$connect= new mysqli('localhost','root','','mysql');

$sql="select username,password from login";

$result=$connect->query($sql);

if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		$pass=$row["password"];
	}
}
if($pass==$oldpass and $newpass==$newpassc and $newpass!="")
{
	$connect->query("UPDATE login SET password='".$newpass."' WHERE password='".$oldpass."';");
}

$connect->query("UPDATE login SET username='".$_POST["nomprof"]."' WHERE password='".$oldpass."';");
if($oldpass==$pass){
	rename("../".$_POST["oldnomprof"],"../".$_POST["nomprof"]);
	header("Location: ../".$_POST["nomprof"]);
}
else{header("Location: ../".$name[2]);}
?>