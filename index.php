<?php 
	
	// Front Controller
	
	// 1. Общие настройки
	//ini_set('display_errors', 1);
	//error_reporting(EP_ALL);

	// 2. Подключение файлов системы
	define('ROOT', dirname(__FILE__));  // устанавливаем именнованную константу  ROOT
	require_once (ROOT.'/components/Autoload.php');  // подключаем файл автозагрузки

	// 3. Установка соеденения с БД

	// 4. Вызов Router
	$router = new Router();
	$router->run();
 ?>