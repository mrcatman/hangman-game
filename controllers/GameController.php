<?php

class GameController
{

	public function actionIndex()
	{
		$gameData=Game::getData();
		require_once('views/game.php');
		return true;
	}

}