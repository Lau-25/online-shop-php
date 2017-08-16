<?php 
	
	class AdminProductController extends Admin
	{
		
// Главная страница
		public function actionIndex()
		{
			// проверка доступа
			self::adminchack();

			$productList = Product::getLatesProducts();

			require_once (ROOT.'/views/admin_product/index.php');

			return true;
		}

// Удаление товара
		public function actionDelete($id)
		{
			// проверка доступа
			self::adminchack();

			if(isset($_POST['submit'])){
				Product::deleteProductById($id);

				header("Location:/admin/product");
			}

			require_once (ROOT.'/views/admin_product/delete.php');

			return true;
		}

// Добавление нового товара
		public function actionCreate()
		{
			// проверка доступа
			self::adminchack();

			// получаем список категорий для выпадающего списка
			$categoriesList = array();
			$categoriesList = Category::getCategoriesList();

			// обрабатываем форму
			if(isset($_POST['submit'])){

				// получаем данные из формы
				$options['name'] = $_POST['name'];
				$options['code'] = $_POST['code'];
				$options['price'] = $_POST['price'];
				$options['category_id'] = $_POST['category_id'];
				$options['description'] = $_POST['description'];
				$options['availability'] = $_POST['availability'];
				$options['is_new'] = $_POST['is_new'];
				$options['statys'] = $_POST['statys'];

				//флаг ошибок в форме
				$errors = false;

				//Валидируем поле Названия товара
				/*if(isset($options['name']) || empty($options['name'])) {
					$erorrs[] = 'Заполните поле';
				}*/

				if($errors == false){
					// Добавляем новый товар
					$id = Product::createProduct($options);

					if($id){
						//проверяем загружалось ли через форму изображение
						if(is_uploaded_file($_FILES["image"]["tmp_name"])){
							// если загружалось, переместим  его в нужную папку и дадим имя
							move_uploaded_file($_FILES["image"]["tmp-name"], $_SERVER['DOCUMENT_ROOT']."upload/images/product/{$id}.jpg");
						}
					}

					header("Location: admin/product");
				}
			}

			require_once (ROOT.'/views/admin_product/create.php');

			return true;
		}

// Ркдактирование товара
		public function actionUpDate($id)
		{
			// проверка доступа
			self::adminchack();

			// получаем список категорий для выпадающего списка
			$categoriesList = array();
			$categoriesList = Category::getCategoriesList();

			// получаем данные о конкретном товаре
			$product = Product::getProductById($id);

			// Обрабатываем форму
			if(isset($_POST['submit'])){
				$options['name'] = $_POST['name'];
				$options['code'] = $_POST['code'];
				$options['price'] = $_POST['price'];
				$options['category_id'] = $_POST['category_id'];
				$options['description'] = $_POST['description'];
				$options['availability'] = $_POST['availability'];
				$options['is_new'] = $_POST['is_new'];
				$options['statys'] = $_POST['statys'];

				if(Product::upDateProduct($id, $options)){
					//echo '<pre>';print_r($_FILES['image']);
					//print_r($_FILES['userfile']['error']); die();
					//проверяем загружалось ли через форму изображение
					if(is_uploaded_file($_FILES["image"]["tmp_name"])){
						// если загружалось, переместим  его в нужную папку и дадим имя
						move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/upload/images/product/{$id}.jpg");
					} else {echo 'problem file'; die();}
				}

				header("Location: admin/product");
			}

			require_once (ROOT.'/views/admin_product/update.php');

			return true;
		}

	}
 ?>