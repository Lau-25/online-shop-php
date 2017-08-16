<?php 

	class AdminOrdersController extends Admin
	{

// Главная страница
		public function actionIndex()
		{
			// проверка доступа
			self::adminchack();

			$ordersList = Orders::getOrdersList();

			require_once (ROOT.'/views/admin_order/index.php');

			return true;
		}

// Создание нового заказа
		public function actionCreate()
		{
			// проверка доступа
			self::adminchack();

			if(isset($_POST['submit'])){

				// получаем данные о заказе
				$option['name_buyer'] = $_POST['name_buyer'];
				$option['phone'] = $_POST['tel'];
				$option['city'] = $_POST['city'];
				$option['stock_number'] = $_POST['stock_number'];
				$option['product_id'] = $_POST['product_id'];
				$option['status'] = 1;
				$option['number_invoice'] = $_POST['number_invoice'];

			}



			require_once (ROOT.'/views/admin_order/create.php');

			return true;
		}
// Удаление заказа
// Просмотр заказа
// Редактирование заказа

	}
 ?>