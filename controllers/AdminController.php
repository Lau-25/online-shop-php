<?php 

	class AdminController extends Admin
	{

		public function actionIndex()
		{
			$login = '';
			$password = '';

			if(isset($_POST['submit'])){
				$login = $_POST['login'];
				$password = $_POST['password'];
			}

			$result = Admin::adminLog($login, $password);

			 if($result){
			 	header("Location: /admin/cabinet");
			 } else {
			 	$errors[] = 'Неверный Login или Password!!!';
			 }

			require_once (ROOT.'/views/admin/login.php');

			return true;
		}
		public function actionCabinet()
		{
			
			// проверка доступа
			self::adminchack();

			require_once (ROOT.'/views/admin/index.php');


			return true;
		}
	}
 ?>