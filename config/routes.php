<?php 
	return array(

		// Управление заказами
		'admin/order/create' => 'adminOrders/create',
		'admin/order/view/([0-9]+)' => 'adminOrders/view/$1',
		'admin/order/update/([0-9]+)' => 'adminOrders/update/$1',
		'admin/order/delete/([0-9]+)' =>'adminOrders/delete/$1',
		'admin/order' => 'adminOrders/index',

		// Управление продуктами
		'admin/product/create' => 'adminProduct/create',
		'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
		'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
		'admin/product' => 'adminProduct/index',

		// Управление категориями
		'admin/category/create' => 'adminCategory/create',
		'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
		'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
		'admin/category' => 'adminCategory/index',

		// Админ панель
		'admin/cabinet' => 'admin/cabinet',  //AdminController -> actionCabinet
		'admin' => 'admin/index',  // AdminController -> actionIndex
		
		
		
		'catalog' => 'catalog/index', // CatalogController -> actionIndex
		'category/([0-9]+)' => 'catalog/category/$1', //CatalogController -> actionCategory
		'product/([0-9]+)' => 'product/view/$1',  // ProductController ->actionView

		'' => 'site/index',  // SiteController -> actionIndex


		

		// Управление товарами
		

	);
 ?>