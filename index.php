<? 
session_start();
require_once('components/Router.php');
require_once('components/Db.php');
$router = new Router();
$router->run();
?>