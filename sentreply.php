<?php
	date_default_timezone_set('prc');
	$rpl=$_POST['rpl'];
	$cid=$_POST['cid'];
if(!empty($_COOKIE["userinfo"])){
	$token=$_COOKIE["userinfo"];
	$pdo= new PDO("mysql:host=localhost;dbname=cmtsys","root","xushixuan"); 
	$rs=$pdo->query("SELECT * FROM user where token='$token'");
	$row = $rs->fetch();
	$uid=$row[0];
	$username=$row[1];
	$date=date('y-m-d H:i:s',time());
	$sql="insert into reply(rcid,cid,uid,content,rptime) values('0','$cid','$uid','$rpl','$date')";
	$count = $pdo->exec($sql);
	echo "<script>alert('回复成功,跳转至主页');location.href='comment.php';</script>"; 
}
?>