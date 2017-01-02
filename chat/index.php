<?php include "func.php";

if( $_COOKIE["data2"] == "1234" ){
	$user = pdo( db() , "SELECT * FROM `".USERS."` WHERE `login` = ? LIMIT 1" , array($_COOKIE["data"]) );

	if( !empty($user) ){
		$user = $user[0];
		set_cookie("data3",$user["id"],365);

		?><!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1"/>
			<title>Chat</title>
			<style><? include "style.viy" ?></style>
			<script><? include "engine.viy";include "func.viy"; ?></script>
		</head>
		<body>
			<div class="error"></div>
			<div class="messageEdit">
				<form type="viy_edit">
					<textarea class="viy_message_edit" id="viy_message_edit"></textarea>
					<input class="viy_messageEdit" type="submit" value=">">
				</form>
			</div>
			<form method="post" id="fileToUpload_form" action="photo.php" enctype="multipart/form-data">
				<input id="fileToUpload" type="file" onchange="$('#fileToUpload_form').submit()" name="fileToUpload" id="fileToUpload">
			</form>
			<div id="menu" class="menu">
				<ul>
					<li id="edit_message">EDIT</li>
					<li id="delete_message">DELETE</li>
				</ul>
			</div>
			<div class="user_choose"><div>></div></div>
			<div class="user">
				<a class='exit' href='signout.php'>+</a>
				<div class="user_photo">
					<img onclick="$('input#fileToUpload').click();" src="<?=$user["image"]?>" />
				</div>
				<div class="user_name">
					<h2>ИМЯ:</h2>
					<input userid="<?=$user["id"]?>" type="first_name" onchange="info(this)" contenteditable="true" value="<?=$user["first_name"]?>" />
					<h2>ФАМИЛИЯ:</h2>
					<input userid="<?=$user["id"]?>" type="sur_name" onchange="info(this)" contenteditable="true" value="<?=$user["sur_name"]?>" />
					<h2>ЛОГИН:</h2>
					<input userid="<?=$user["id"]?>" type="login" onchange="info(this)" contenteditable="true" value="<?=$user["login"]?>" />
				</div>
			</div>
			<div class="container">
				<div id="messages" class="messages"><?

					foreach(pdo(db(),"SELECT * FROM `". MES ."` LIMIT 30") as $a => $_ ){
						$image = pdo(db(),"SELECT * FROM `". USERS ."` WHERE `id` = ? LIMIT 1", array($_["user_id"]) );
						$image = $image[0]["image"];

						if($_["user_id"]==$user["id"]){
?><div class="messages_wrap" id="<?=$_['id']?>"><div class="author"><p oncontextmenu="return menu(this)"><?=$_["message"]?></p><span><?=substr(substr(substr($_["time"],-6),0,4),0,2).":".substr(substr(substr($_["time"],-6),0,4),2);?></span><img src="<?=$image?>" /></div></div><?
						}else{
?><div class="messages_wrap" id="<?=$_['id']?>"><div class="not_author"><img src="<?=$image?>" /><span><?=substr(substr(substr($_["time"],-6),0,4),0,2).":".substr(substr(substr($_["time"],-6),0,4),2);?></span><p><?=$_["message"]?></p></div></div><?
						}
					}

				?></div>
				<div class="messageSend">
					<form type="viy_send">
						<textarea class="viy_message" id="viy_message"></textarea>
						<input class="viy_messageSend" type="submit" value=">">
					</form>
				</div>
			</div>
		</body>
		</html><?

		die();
	}else{
		set_cookie("data","viy",0);
		set_cookie("data2","viy",0);

		?><!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
			<title>Chat</title>
			<? include "start.viy" ?>
			<meta name="viewport" content="width=device-width, initial-scale=1"/>
		</head>
		<body>
		<table viy="encrypt">
			<tbody>
				<tr>
					<td><button onclick="pass(this.innerHTML)">1</button></td>
					<td><button onclick="pass(this.innerHTML)">2</button></td>
					<td><button onclick="pass(this.innerHTML)">3</button></td>
					<td><button onclick="v('data2').value = v('data2').value.substr(0,(v('data2').value.length-1))"><</button></td>
				</tr>
				<tr>
					<td><button onclick="pass(this.innerHTML)">4</button></td>
					<td><button onclick="pass(this.innerHTML)">5</button></td>
					<td><button onclick="pass(this.innerHTML)">6</button></td>
				</tr>
				<tr>
					<td><button onclick="pass(this.innerHTML)">7</button></td>
					<td><button onclick="pass(this.innerHTML)">8</button></td>
					<td><button onclick="pass(this.innerHTML)">9</button></td>
				</tr>
			</tbody>
		</table>
			<form method="post">
				<input placeholder="ЛОГИН" type="text" name="data" />
				<input placeholder="ПАРОЛЬ" id="data2" type="password" name="data2" />
				<input type="submit" value="ВОЙТИ" />
			</form>
		</body>
		</html><?

		die();
	}
}

if( isset($_POST["data"]) && isset($_POST["data2"]) ){
	if($_POST["data2"] == "1234"){
		set_cookie("data",$_POST["data"],365);
		set_cookie("data2",$_POST["data2"],365);
		echo "<script>location.reload()</script>";
		unset($_POST["data2"]);
		unlink($_POST["data2"]);
		die();
	}
}

set_cookie("data","viy",0);
set_cookie("data2","viy",0);

?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<? include "start.viy" ?>
</head>
<body>
<table viy="encrypt">
	<tbody>
		<tr>
			<td><button onclick="pass(this.innerHTML)">1</button></td>
			<td><button onclick="pass(this.innerHTML)">2</button></td>
			<td><button onclick="pass(this.innerHTML)">3</button></td>
			<td><button onclick="v('data2').value = v('data2').value.substr(0,(v('data2').value.length-1))"><</button></td>
		</tr>
		<tr>
			<td><button onclick="pass(this.innerHTML)">4</button></td>
			<td><button onclick="pass(this.innerHTML)">5</button></td>
			<td><button onclick="pass(this.innerHTML)">6</button></td>
		</tr>
		<tr>
			<td><button onclick="pass(this.innerHTML)">7</button></td>
			<td><button onclick="pass(this.innerHTML)">8</button></td>
			<td><button onclick="pass(this.innerHTML)">9</button></td>
		</tr>
	</tbody>
</table>
	<form method="post">
		<input placeholder="ЛОГИН" type="text" name="data" />
		<input placeholder="ПАРОЛЬ" id="data2" type="password" name="data2" />
		<input type="submit" value="ВОЙТИ" />
	</form>
</body>
</html>
