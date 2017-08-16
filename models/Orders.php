<?php 

	class Orders
	{

// Получаем список всех заказов
		public static function getOrdersList()
		{
			// подключаемся к БД
			$db = DB::getConnection();

			$ordersList = array();

			$result = $db->query('SELECT id_orders, name_buyer, phone, date_order, status FROM orders INNER JOIN buyer ON orders.id_buyer = buyer.id_buyer INNER JOIN product ON orders.id_product = product.id_product ');

			$i=0;
			while($row = $result->fetch()){
				$ordersList[$i]['id'] = $row['id_orders'];
				$ordersList[$i]['name_buyer'] = $row['name_buyer'];
				$ordersList[$i]['phone'] = $row['phone'];
				$ordersList[$i]['date_order'] = $row['date_order'];
				$ordersList[$i]['status'] = $row['status'];

				$i++;
			}

			return $ordersList;
			
			print_r($row = $result->fetch(PDO::FETCH_ASSOC));
		}

// Создаем новый заказ
		public static function createOrder($option)
		{
			// подключаемся к БД
			$db = DB::getConnection();

			// создаем нового покупателя и получаем его id
			$sql = 'INSERT INTO buyer'
					.'(name_buyer, phone, url_vk, url_fb, city, stock_number, comment) '
					.'VALUES '
					.'(:name_buyer, :phone, :url_vk, :url_fb, :city, :stock_number, :comment)';

			$result = $db->prepare($sql);
			$result->bindParam(':name_buyer', $option['name_buyer'], PDO::PARAM_STR);
			$result->bindParam(':phone', $option['tel'], PDO::PARAM_INT);
			$result->bindParam(':url_vk', $option['url_vk'], PDO::PARAM_STR);
			$result->bindParam(':url_fb', $option['url_fb'], PDO::PARAM_STR);
			$result->bindParam(':city', $option['city'], PDO::PARAM_STR);
			$result->bindParam(':stock_number', $option['stock_number'], PDO::PARAM_INT);
			$result->bindParam(':comment', $option['comment'], PDO::PARAM_STR);

			if($result->execute()){
				$id_buyer = $db->lastInsertId();
			}


			// создаем новый заказ
			$date_order = date('H:i:s  m.d.y');

			$sql = 'INSERT INTO orders '
					.'(id_buyer, id_product, date_order, status, number_invoice) '
					.'VALUES '
					.'(:id_buyer, :product_id, :date_order, :status, :number_invoice)';

			$result = $db->prepare($sql);
			$result->bindParam(':id_buyer', $id_buyer, PDO::PARAM_INT);
			$result->bindParam(':id_product', $option['id_product'], PDO::PARAM_INT);
			$result->bindParam(':date_order', $date_order, PDO::PARAM_INT);
			$result->bindParam(':status', $option['status'], PDO::PARAM_STR);
			$result->bindParam(':number_invoice', $option['number_invoice'], PDO::PARAM_STR);

			if($result->execute()){
				return $db->lastInsertId();
			}
			
			return 0;
		}
	}
 ?>
 