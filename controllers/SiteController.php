<?php 
	include_once ROOT.'/models/Category.php';
	include_once ROOT.'/models/Product.php';

	class SiteController
	{

// Вывод главной страницы
		public function actionIndex()
		{
			$categories = array();
			$categories = Category::getCategoriesList();

			$lastProduct = array();
			$lastProduct = Product::getLatesProducts();

			require_once (ROOT.'/views/site/index.php');

			return true;
		}
	}
 ?>