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
}