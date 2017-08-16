<?php 
	
	class Product
	{
		const SHOW_BY_DEFAULT = 10;
		
// Выводим последние продукты
		public static function getLatesProducts($count = self::SHOW_BY_DEFAULT)
		{
			$count = intval($count);

			// подключаемся к БД
			$db = DB::getConnection();

			$productsList = array();

			$result = $db->query('SELECT id_product, name, price, image, is_new FROM product '
								.'WHERE statys="1" '
								.'ORDER BY id_product DESC '
								.'LIMIT '. $count );
			$i=0;
			while($row = $result->fetch()){
				$productsList[$i]['id'] = $row['id_product'];
				$productsList[$i]['name'] = $row['name'];
				$productsList[$i]['price'] = $row['price'];
				$productsList[$i]['image'] = $row['image'];
				$productsList[$i]['is_new'] = $row['is_new'];

				$i++;
			}

			return $productsList;
		}

// получаем список продуктов одной категории
		public static function getProductsListByCategory($categoryId = false)
		{
			if($categoryId){

				// подключаемся к БД
				$db = DB::getConnection();

				$productsList = array();

				$result = $db->query("SELECT id_product, name, price, image, is_new FROM product "
								."WHERE statys='1' AND category_id = '$categoryId' "
								."ORDER BY id DESC "
								."LIMIT ".self::SHOW_BY_DEFAULT );
				$i=0;
				while($row = $result->fetch()){
					$productsList[$i]['id'] = $row['id_product'];
					$productsList[$i]['name'] = $row['name'];
					$productsList[$i]['price'] = $row['price'];
					$productsList[$i]['image'] = $row['image'];
					$productsList[$i]['is_new'] = $row['is_new'];

					$i++;
				}
			}

			return $productsList;
		}

// получаем инфу о продукте по Id
		public static function getProductById($id)
		{
			// подключаемся к БД
			$db = DB::getConnection();

			$productsList = array();

			$result = $db->query("SELECT * FROM product WHERE id_product = '$id' " );
			//$result->setFetchMode(PDO::FETCH_ASSOC);
			 
			return $result->fetch();
		}

// удаляем продукт по Id
		public static function deleteProductById($id)
		{
			// подключаемся к БД
			$db = DB::getConnection();

			$sql = "DELETE FROM product WHERE id_product = :id";

			$result = $db->prepare($sql);

			$result->bindParam(':id', $id);

			return $result->execute();
		}

// Добавляем новый продукт
		public static function createProduct($options)
		{
			// подключаемся к БД
			$db = DB::getConnection();

			$sql = 'INSERT INTO product '
					. '(name, category_id, code, price, availability, description, is_new, statys) '
					. 'VALUES '
					. '(:name, :category_id, :code, :price, :availability, :description, :is_new, :statys)';

			$result = $db->prepare($sql);
			$result->bindParam(':name', $options['name'], PDO::PARAM_STR);
			$result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
			$result->bindParam(':code', $options['code'], PDO::PARAM_STR);
			$result->bindParam(':price', $options['price'], PDO::PARAM_STR);
			$result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
			$result->bindParam(':description', $options['description'], PDO::PARAM_STR);
			$result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
			$result->bindParam(':statys', $options['statys'], PDO::PARAM_INT);

			if($result->execute()){
				return $db->lastInsertId();
			}
			return 0;
		}

// Обновляем товар
		public static function upDateProduct($id, $options)
		{
			// подключаемся к БД
			$db = DB::getConnection();

			$sql = "UPDATE product
					SET name = :name,
						category_id = :category_id,
						code = :code,
						price = :price,
						availability = :availability,
						description = :description,
						is_new = :is_new,
						statys = :statys
					WHERE id_product = :id";

			$result = $db->prepare($sql);
			$result->bindParam(':id', $id, PDO::PARAM_INT);
			$result->bindParam(':name', $options['name'], PDO::PARAM_STR);
			$result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
			$result->bindParam(':code', $options['code'], PDO::PARAM_STR);
			$result->bindParam(':price', $options['price'], PDO::PARAM_STR);
			$result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
			$result->bindParam(':description', $options['description'], PDO::PARAM_STR);
			$result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
			$result->bindParam(':statys', $options['statys'], PDO::PARAM_INT);

			return $result->execute();
		}
	}
 ?>