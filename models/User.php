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
			$password_md5 = md5($password);
			$db = Db::getConnection();
			$same_username = mysqli_num_rows($db->query("select * from users where username='$username'"));
			if ($same_username>0) {
				return array('success'=>0,'text'=>'Такое имя пользователя уже зарегистрировано');
			} else {
				$register = $db->query("insert into users(username,password) values ('$username','$password_md5')");
				$_SESSION['userid']=$db->insert_id;
				$_SESSION['username']=$username;
				return array('success'=>1,'text'=>'Успешная регистрация');
			}
		}
	}
	
	
	public static function login($username,$password) {
		$password_md5 = md5($password);
		$db = Db::getConnection();
		$query = $db->query("select * from users where username='$username' and password='$password_md5'");
		$rows=mysqli_num_rows($query);
		if ($rows>0) {
			$_SESSION['userid']=mysqli_fetch_array($query)['id'];
			$_SESSION['username']=$username;
			return array('success'=>1,'text'=>'Успешный вход');
		} else {
			return array('success'=>0,'text'=>'Неверные данные');
		}
	}
}