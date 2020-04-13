<?php

$dir = 'dm' . DIRECTORY_SEPARATOR . '/';
$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($it,RecursiveIteratorIterator::CHILD_FIRST);
foreach($files as $file) {
	if ($file->isDir()){
			rmdir($file->getRealPath());
		}
 	else {
			unlink($file->getRealPath());
	}
}
$dir = 'ds' . DIRECTORY_SEPARATOR . '/';
$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($it,RecursiveIteratorIterator::CHILD_FIRST);
foreach($files as $file) {
	if ($file->isDir()){
			rmdir($file->getRealPath());
		}
 	else {
			unlink($file->getRealPath());
	}
}
$dir = 'coursexo' . DIRECTORY_SEPARATOR . '/';
$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($it,RecursiveIteratorIterator::CHILD_FIRST);
foreach($files as $file) {
	if ($file->isDir()){
			rmdir($file->getRealPath());
		}
 	else {
			unlink($file->getRealPath());
	}
}
$connect=new mysqli('localhost','root','','mysql');
$connect->query("DELETE FROM dm");
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>