<?php
date_default_timezone_set('prc');
$rplcid=$_POST['rplcid'];
$ci=$_POST['ci'];
if(!empty($_COOKIE["userinfo"])){
	$token=$_COOKIE["userinfo"];
	$pdo= new PDO("mysql:host=localhost;dbname=cmtsys","root","xushixuan"); 
	$rs1=$pdo->query("SELECT cid,rid,content,username,rptime FROM reply,user WHERE cid = ".$rplcid." AND reply.uid=user.uid order BY rid desc");
	$rowCount1=$rs1->rowCount();
	$count1=$rowCount1>10?10:$rowCount1;
	$row1=$rs1->fetchALL();
	for($i=0;$i<$count1;$i++){
		$info.='<ol><li>'.$row1[$i][1].'</br>'.$row1[$i][2].' '.$row1[$i][3].'</li></ol>';
	}
	echo "<script>
		document.getElementById('cttrpl').innerHTML="+$info+";
	</script>"
	
}
?>