
<?php
date_default_timezone_set('prc');
$username=$_POST['username'];
$password=$_POST['password'];

$pdo= new PDO("mysql:host=localhost;dbname=cmtsys","root","xushixuan"); 
$rs=$pdo->query("SELECT password FROM user where username='$username'");
$row = $rs->fetch();

if($row[0]==$password){
	$date=date('y-m-d H:i:s',time());
	$info=$username.$password.$date;
	$md=md5($info);
	setcookie("userinfo",$md,time()+24*3600);
	
	$sql = "update user set token = ('$md') where username = '$username';)";
	$pdo->exec($sql);
	$sql = "update user set timelastedlogin = ('$date') where username = '$username';)";
	$pdo->exec($sql);
	//echo $count;
	echo "<script>alert('登陆成功,跳转至主页');location.href='comment.php';</script>"; 
} 
else
	echo "账号或密码错误";

?>
















