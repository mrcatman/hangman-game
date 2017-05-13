<?php

class User
{
	public static function register($username,$password) {
		$username = addslashes($username);
		$password = addslashes($password);
		if ($username=='' || $password=='') {
			return array('success'=>0,'text'=>'Имя пользователя или пароль не может быть пустым');
		} elseif (strlen($password)<5) {
			return array('success'=>0,'text'=>'Пароль слишком короткий');
		} else {
			$db = Db::getConnection();
			$same_username = mysqli_num_rows($db->query("select * from users where username='$username'"));
			if ($same_username>0) {
				return array('success'=>0,'text'=>'Такое имя пользователя уже зарегистрировано');
			} else {
				$register = $db->query("insert into users(username,password) values ('$username','$password')");
				$_SESSION['username']=$username;
				return array('success'=>1,'text'=>'Успешная регистрация');
			}
		}
	}

	
}