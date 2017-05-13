<?php

class UserController
{

	public function actionLogin()
	{
		require_once('views/login.php');
		return true;
	}

}