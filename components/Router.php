<?php 
	
	class Router
	{

		private $routes;

		public function __construct()
		{
			$routesPath = ROOT.'/config/routes.php';
			$this->routes = include($routesPath);
		}
// Получает строку запроса и возвращает ее в методе
		private function getURI()
		{
			if(!empty($_SERVER['REQUEST_URI'])) {
				return trim($_SERVER['REQUEST_URI'], '/');
			}
		}

		public function run()
		{
			// Получить строку заппроса
			$uri = $this->getURI();
			
			// Проверить наличие такого запроса в routes.php
			foreach($this->routes as $uriPattern => $path) {

				// Сравниваем строку запроса uri и uriPattern
				if(preg_match("~$uriPattern~", $uri)) {

					// Получаем внутренний путь из внешнего согласно правилу
					$internalRout = preg_replace("~$uriPattern~", $path, $uri);

					// Если есть совпадение определить какой 
					// controller и action обрабатывает запрос
					$segments = explode('/', $internalRout);

					// Формируем имя контроллера
					$controllerName = array_shift($segments).'Controller';

					// Делаем имя с большой буквы
					$controllerName = ucfirst($controllerName);

					// Формируем имя екшена
					$actionName = 'action'.ucfirst(array_shift($segments));

					$parametr = $segments;



					// Подключить файл класса контроллера
					$controllerFile = ROOT. '/controllers/' . $controllerName . '.php';

					if(file_exists($controllerFile)) {
						include_once($controllerFile);
					}

					// Создать обект и вызвать метод
					$controllerObject = new $controllerName;

					//$result = $controllerObject->$actionName($parametr);
					$result = call_user_func_array(array($controllerObject, $actionName), $parametr);
					if($result != null) {
						break;
					}
				}
			}
		}
	}
 ?>