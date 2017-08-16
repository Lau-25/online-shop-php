<?php 
	
	abstract class AdminBase
	{

		public static function checkAdmin()
		{
			// проверяем авторизирован ли пользователь, если нет он будет переадресован
			$userId = User::checkLogged();

			// получаем инфу о текущем пользователе
			$user = User::getUserById($userId);

			// если пользователь админ, пускаем его в админ панель
			if($user['pole'] == 'admin'){
				return true;
			}

			/*
			// иначе завершаем работу с сообщением об ошибке
			die('Access denied -> Доступ запрещен!!!');
			*/
		}
	}
 ?>