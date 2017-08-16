<?php 
	
	class AdminCategoryController extends Admin
	{
// Главная страница
		public function actionIndex()
		{
			// проверка доступа
			self::adminchack();

			$categoriesList = Category::getCategoriesList();

			require_once (ROOT.'/views/admin_category/index.php');

			return true;
		}

// Добавление новой категории
		public function actionCreate()
		{
			// проверка доступа
			self::adminchack();

			if(isset($_POST['submit'])){

				// получаем данные из формы
				$options['name'] = $_POST['name'];
				$options['sort_order'] = $_POST['sort_order'];
				$options['status'] = $_POST['status'];

				$id = Category::createCategory($options);

				header("Location: admin/category");
			}
			
			require_once (ROOT.'/views/admin_category/create.php');

			return true;
		}

// Редактирование категории
		public function actionUpdate($id)
		{
			// проверка доступа
			self::adminchack();

			// получаем информацию о категории
			$category = Category::getCategoryById($id);

			// обрабатываем форму
			if(isset($_POST['submit'])){

				// получаем данные из формы
				$option['name'] = $_POST['name'];
				$option['sort_order'] = $_POST['sort_order'];
				$option['status'] = $_POST['status'];

				if(Category::updateCategory($id, $option)){
					header("Location: admin/category");
				} else {
					echo 'Категория не добавленна';
				}
			}


			require_once (ROOT.'/views/admin_category/update.php');

			return true;
		}

// Удаление категории
		public function actionDelete($id)
		{
			// проверка доступа
			self::adminchack();

			if(isset($_POST['submit'])){
				Category::deleteCategoryById($id);

				header("Location: admin/category");
			}

			require_once (ROOT.'/views/admin_category/delete.php');

			return true;
		}
	}
?>