<?php 
	
	class ProductController
	{

		public function actionView($productId)
		{
			$categories = array();
			$categories = Category::getCategoriesList();

			$product = array();
			$product = Product::getProductById($productId);

			include_once (ROOT.'/views/product/view.php');

			return true;
		}
	}
 ?>