<?php 
session_start();
	if($_SESSION['role'] == 'admin'){
		include_once (ROOT.'/views/layouts/header_admin.php');
			echo 'admin - panel, hellow - '.$_SESSION['role'];
?>
<section>
	<div class="container">
		<div class="row">
			<br/>
			<h4>Добрый день администратор - <?php echo $_SESSION['name']; ?></h4>
			<br/>

			<p>Управление сайтом</p>
			<br/>

			<ul>
				<li><a href="/admin/product">Управление товарами</a></li>
				<li><a href="/admin/category">Управление категориями</a></li>
				<li><a href="/admin/order">Управление заказами</a></li>
			</ul>
		</div>
	</div>
</section>

<?php
		include_once (ROOT.'/views/layouts/footer_admin.php');
	}else{ echo 'У Вас нет доступа!!!'; }
?>
