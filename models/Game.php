<?php
class Game
{
	public static function getData() {
		$db=Db::getConnection();
		if (!$_SESSION || !$_SESSION['userid']) {
			return array('logged_in'=>0);
		} else {
			$userid = $_SESSION['userid'];
			$data = $db->query("select * from games where user='$userid'");
			if (mysqli_num_rows($data)>0) {
				return array('logged_in'=>1,'game_started'=>1);
			} else {
				return array('logged_in'=>1,'game_started'=>0);
			}
		}
	}

}