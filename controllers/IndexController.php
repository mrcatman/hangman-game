<?php

class IndexController
{

	public function actionIndex()
	{
		require_once('views/index.php');
		return true;
	}

}