<?php 

	class CatalogController
	{

		public function actionIndex()
		{
			$categories = array();
			$categories = Category::getCategoriesList();

			$lastProduct = array();
			$lastProduct = Product::getLatesProducts(5);

			require_once (ROOT.'/views/catalog/index.php');

			return true;
		}

		public function actionCategory($categoryId)
		{
			$categories = array();
			$categories = Category::getCategoriesList();

			$categoryProduct = array();
			$categoryProduct = Product::getProductsListByCategory($categoryId);

			require_once (ROOT.'/views/catalog/category.php');

			return true;
		}
	}
 ?>