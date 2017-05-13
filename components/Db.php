<?
class Db
{
	public static function getConnection()
	{
		$db = new mysqli('127.0.0.1', 'root', '', 'hangman') or die('error');
		return $db;
	}
}
?>