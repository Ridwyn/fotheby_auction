<?php
namespace GENERAL;
class EntryPoint {
	private $routes;

	public function __construct(\GENERAL\Routes $routes) {
        $this->routes = $routes;
    }



	public function run() {
		$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
		$routes = $this->routes->getRoutes();
		$routes=$this->routes->checkLogin($routes,$route);
		$authentication = $this->routes->getAuth();
		$method = $_SERVER['REQUEST_METHOD'];

		$controller = $routes[$route][$method]['controller'];
		$functionName = $routes[$route][$method]['function'];
		$page = $controller->$functionName();
		$output = $this->loadTemplate('../Templates/' . $page['template'], $page['variables']);
		$title = $page['title'];
		echo $this->loadTemplate('../Templates/layout.html.php', $this->routes->getVarsForLayout($title, $output));

	}


	public function loadTemplate($fileName, $templateVars) {
		extract($templateVars);
		ob_start();
		require $fileName;
		$contents = ob_get_clean();
		return $contents;
	}
}
