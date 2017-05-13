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
				
					if (class_exists($controllerName)) {
						$controllerObject = new $controllerName;
						$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
					}	else {
						include('views/404.php');
					}	
					break;
			}
		}			
	}
} ?>
