<html>
<?php
if(!empty($_COOKIE["userinfo"])){
	$token=$_COOKIE["userinfo"];
	$pdo= new PDO("mysql:host=localhost;dbname=cmtsys","root","xushixuan"); 
	$rs=$pdo->query("SELECT * FROM user where token='$token'");
	$row = $rs->fetch();
	$username=$row[1];
	echo($username);
	$rs=$pdo->query("SELECT cid,content,username,cmttime FROM user,comment where user.uid=comment.uid order by cid desc ");
	$rowCount=$rs->rowCount();
	$row=$rs->fetchALL();
	$count=$rowCount>10?10:$rowCount;;
}
?>

<script>
window.onload=function(){
	var html='';
	html+='<?php for($i=0;$i<$count;$i++){
			 $info='<li>'.$row[$i][1].'</br>'.$row[$i][2].' '.$row[$i][3].'发布</li><button type="button" onclick="reply('.$i.','.$row[$i][0].','.$row[$i][2].')">回复</button><div id="reply'.$i.'"></div><form action="loadrpl.php" method="post" id="loadrpl'.$i.'"name="loadrpl'.$i.'"><input id="rplcid" type="hidden" name="rplcid" value="'.$row[$i][0].'"/><input id="ci" type="hidden" name="ci" value="'.$i.'"/></form><div id="cttrpl"></div>';
			 echo $info;
			 }
	?>';
	document.getElementById('cmtol').innerHTML=html;
}
function reply(i,cid,rcn){
	document.getElementById('loadrpl'+i).submit;
	document.getElementById('reply'+i).innerHTML='<form action="sentreply.php" method="post"> <input name="rpl" type="text" placeholder="在此写下回复内容"></input><input id="cid" type="hidden" name="cid" value="'+cid+'"/><input type="submit" value="提交"/></form>';
}
</script>
	<h>Login success!  let's talking together! </h>

	<img src="/images/content.jpg" />
		<div>
			<ol id="cmtol">
			</ol>
			<form  action="sentcmt.php" method="post" autocomplete="on">
				<textarea name="cmt" rows="10" cols="100" maxlength="50" placeholder="在此评论" ></textarea>
				<input type="submit" value="提交评论"/>
			</form>
		</div>
</html>