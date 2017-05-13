<?php

class UserController
{

	public function actionLogin()
	{
		require_once('views/login.php');
		return true;
	}
	
	public function actionRegister()
	{
		require_once('views/register.php');
		return true;
	}
	
	public function actionHandleRegister()
	{
		$data = User::register($_POST['username'],$_POST['password']);
		echo json_encode($data);
		return true;
	}
	
	public function actionHandleLogin()
	{
		$data = User::login($_POST['username'],$_POST['password']);
		echo json_encode($data);
		return true;
	}
}