<?php
date_default_timezone_set('prc');
$cmt=$_POST['cmt'];
if(!empty($_COOKIE["userinfo"])){
	$token=$_COOKIE["userinfo"];
	$pdo= new PDO("mysql:host=localhost;dbname=cmtsys","root","xushixuan"); 
	$rs=$pdo->query("SELECT * FROM user where token='$token'");
	$row = $rs->fetch();
	$uid=$row[0];
	$username=$row[1];
	$date=date('y-m-d H:i:s',time());
	$sql="insert into comment(uid,content,cmttime) values('$uid','$cmt','$date')";
	$count = $pdo->exec($sql);
	echo "<script>alert('评论成功,跳转至主页');location.href='comment.php';</script>"; 
	
}
?>