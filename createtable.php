<?php 

	require_once 'php/db.php';
	$create_date = date("Y-m-d H:i:s");
	
	$aaa = '123';
	$sql ="CREATE TABLE `{$aaa}`
 (id int(5) auto_increment primary key,
  title varchar(30),
  content text,
  create_date datetime);" ;
	
	$query = mysqli_query($_SESSION['link'],$sql);
	
	
	echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['link']);
	
?>