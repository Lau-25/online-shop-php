<?php include_once ROOT.'/views/layouts/header_admin.php'; ?>

<section>
	<div class="container">
		<div class="row">
			<br/>
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="/admin">Админпанель</a></li>
					<li><a href="/admin/product">Управление заказами</a></li>
					<li class="active">Создать новый заказ</li>
				</ol>
			</div>

			<h3>Добавить новый заказ</h3>
			<div class="col-lg-4">
				<div class="login-form">
					<form action="#" method="POST" enctype="multipart/form-data">
						
						<p>Имя заказчика :</p>
						<input type="text" name="name_buyer" placeholder="" value="">

						<p>Телефон заказчика :</p>
						<input type="text" name="tel" placeholder="" value="">

						<p>Город :</p>
						<input type="text" name="city" placeholder="" value="">

						<p>Номер склада :</p>
						<input type="text" name="stock_number" placeholder="" value="">

						<p>Номер продукта :</p>
						<input type="text" name="product_id" placeholder="" value="">

						<p>Номер ТТН :</p>
						<input type="text" name="number_invoice" placeholder="" value="">


						<input type="submit" name="submit" class"btn btn-default" value="Сохранить">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include_once ROOT.'/views/layouts/footer_admin.php'; ?>