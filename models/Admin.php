<?php 
	
	class Admin
	{
		
		public static function adminLog($login, $password)
		{
			// проверяем авторизирован ли пользователь, если нет он будет переадресован
			$db = Db::getConnection();

			$result = $db->query("SELECT * FROM admins");
			$result->setFetchMode(PDO::FETCH_ASSOC);
			$row = $result->fetch();

			
			if($login == $row['login'] and $password == $row['password']){
				session_start();
				$_SESSION['role'] = $row['role'];
				$_SESSION['name'] = $row['name'];
				return true;
			} else {
				return false;
			}
		}

		public static function adminchack()
		{
			session_start();
			if(isset($_SESSION['role']) and $_SESSION['role'] == 'admin'){
				return true;
			} else {
				die('You not admin');
			}
		}
	}
 ?>