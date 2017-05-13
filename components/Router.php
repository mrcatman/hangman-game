<? 
		
class Router
{

	private $routes;
	public function __construct()
	{
		$routesPath = 'components/routes.php'; 
		$this->routes = include($routesPath);
	}

	private function getURI()
	{
		return trim($_SERVER['REQUEST_URI'],'/');
	}

	
	public function run()
	{
		$uri = $this->getURI();
		$db = Db::getConnection();
		foreach ($this->routes as $uriPattern => $path) {
			if(preg_match("~$uriPattern~", $uri)){
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				$segments = explode('/', $internalRoute);
				$modelName = array_shift($segments);
				$controllerName = $modelName.'Controller';
				$modelName = ucfirst($modelName);
				$controllerName = ucfirst($controllerName);
				$actionName = 'action'.ucfirst(array_shift($segments));
					$parameters = $segments;
					$controllerFile = 'controllers/'.$controllerName.'.php';
					if (file_exists($controllerFile)){
						include_once($controllerFile);
					}
					$modelFile = 'models/'.$modelName.'.php';
					if (file_exists($modelFile)){
						include_once($modelFile);
					}
					if ($_SERVER['REQUEST_METHOD']!='POST') {
						include('views/header.php');
					}
					if (strpos($uri,'/')!==false) {
							
						}
					if (class_exists($controllerName)) {
						$controllerObject = new $controllerName;
						if (method_exists($controllerObject, $actionName)===false) { 
							$strings = explode('/',$uri);
							if (method_exists($controllerObject, 'action'.ucfirst($strings[1]))) {
								$result = call_user_func_array(array($controllerObject, 'action'.ucfirst($strings[1])), $parameters);
							} else {
								include('views/404.php');
							}
						} else {
							$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
						}
					}	else {
						include('views/404.php');
					}
					if ($_SERVER['REQUEST_METHOD']!='POST') {
						include('views/footer.php');
					}		
					break;
			}
		}			
	}
} ?>
