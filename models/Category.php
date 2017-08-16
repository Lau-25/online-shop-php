<?php 

	class Category
	{

//Получаем список всех категорий
		public static function getCategoriesList()
		{
			// подключаемся к БД
			$db = DB::getConnection();

			$categoriesList = array();

			$result = $db->query("SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC");

			$i=0;
			while($row = $result->fetch()){
				$categoriesList[$i]['id'] = $row['id'];
				$categoriesList[$i]['name'] = $row['name'];
				$categoriesList[$i]['sort_order'] = $row['sort_order'];
				$categoriesList[$i]['status'] = $row['status'];

				$i++;
			}

			return $categoriesList;
		}

// Вспомагательная функция для отображения статуса категории
		public static function getStatusText($category)
		{
			if($category == 1){
				echo 'Отображать';
			} else {
				echo 'Не отображать';
			}
		}

// Создаем новую категорию
		public static function createCategory($option)
		{
			// подключаемся к БД
			$db = DB::getConnection();

			$sql = 'INSERT INTO category '
					.'(name, sort_order, status) '
					.'VALUES '
					.'(:name, :sort_order, :status)';

			$result = $db->prepare($sql);
			$result->bindParam(':name', $option['name'], PDO::PARAM_STR);
			$result->bindParam(':sort_order', $option['sort_order'], PDO::PARAM_INT);
			$result->bindParam(':status', $option['status'], PDO::PARAM_INT);

			if($result->execute()){
				return $db->lastInsertId();
			}
			return 0;
		}

// Получаем данные о категории по ID
		public static function getCategoryById($id)
		{
			// подключаемся к БД
			$db = DB::getConnection();

			$categoryList = array();

			$result = $db->query("SELECT * FROM category WHERE id = '$id' ");

			return $result->fetch();
		}

// Обновляем данные о категории
		public static function updateCategory($id, $option)
		{
			// подключаемся к БД
			$db = DB::getConnection();

			$sql = "UPDATE category
					SET name = :name,
						sort_order = :sort_order,
						status = :status
					WHERE id = :id";

			$result = $db->prepare($sql);
			$result->bindParam(':name', $option['name'], PDO::PARAM_STR);
			$result->bindParam(':sort_order', $option['sort_order'], PDO::PARAM_INT);
			$result->bindParam(':status', $option['status'], PDO::PARAM_INT);
			$result->bindParam(':id', $id, PDO::PARAM_INT);

			return $result->execute();
		}

// Удаление категории
		public static function deleteCategoryById($id)
		{
			// подключаемся к БД
			$db = DB::getConnection();

			$sql = "DELETE FROM category WHERE id = :id ";

			$result = $db->prepare($sql);
			$result->bindParam(':id', $id, PDO::PARAM_INT);

			return $result->execute();
		}

	}
 ?>