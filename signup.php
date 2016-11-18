<?php
$username=$_POST['usernamesignup'];
$emaill=$_POST['emailsignup'];
$password=$_POST['passwordsignup'];
$pdo= new PDO("mysql:host=localhost;dbname=cmtsys","root","xushixuan"); 
$sql = "insert into user(username,email,password) values('$username', '$emaill', '$password')";
$count = $pdo->exec($sql);
if($count)
	echo "<script>alert('注册成功,跳转至登陆界面');location.href='index.html';</script>"; 
else
	echo '用户已经存在,注册失败';
?>