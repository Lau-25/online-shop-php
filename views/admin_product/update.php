<?php include_once ROOT.'/views/layouts/header_admin.php'; ?>

<section>
	<div class="container">
		<div class="row">
			<br/>
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="/admin">Админпанель</a></li>
					<li><a href="/admin/product">Управление товарами</a></li>
					<li class="active">Редактировать товар</li>
				</ol>
			</div>

			<h3>Редактировать товар #<?php echo $product['id']; ?></h3>
			<div class="col-lg-4">
				<div class="login-form">
					<form action="#" method="POST" enctype="multipart/form-data">
						
						<p>Название товара :</p>
						<input type="text" name="name" placeholder="" value="<?php echo $product['name']; ?>">

						<p>Артикул :</p>
						<input type="text" name="code" placeholder="" value="<?php echo $product['code']; ?>">

						<p>Стоимость :</p>
						<input type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">

						<p>Категория :</p>
						<select name="category_id">
							<?php if(isset($categoriesList)): ?>
								<?php foreach($categoriesList as $category): ?>
									<option value="<?php echo $category['id']; ?>" 
										<?php if($product['category_id'] == $category['id']) echo 'selected="selected"'; ?>
										>
										
										<?php echo $category['name']; ?>
									</option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
						<br/> <br/>

						<p>Изображение товара :</p>
						<input type="file" name="image" placeholder="" value="">

						<p>Детальное описание :</p>
						<textarea name="description"><?php echo $product['description']; ?></textarea>
						<br/><br/>

						<p>Наличие на складе</p>
						<select name="availability">
							<option value="1" <?php if($product['availability'] == 1) echo 'selected="selected"';?> >Да</option>
							<option value="0" <?php if($product['availability'] == 0) echo 'selected="selected"';?> >Нет</option>
						</select>

						<br/><br/>

						<p>Новинка</p>
						<select name="is_new">
							<option value="1" <?php if($product['is_new'] == 1) echo 'selected="selected"';?> >Да</option>
							<option value="0" <?php if($product['is_new'] == 0) echo 'selected="selected"';?> >Нет</option>
						</select>

						<br/><br/>

						<p>Статус</p>
						<select name="statys">
							<option value="1" <?php if($product['statys'] == 1) echo 'selected="selected"';?> >Отображать</option>
							<option value="0" <?php if($product['statys'] == 0) echo 'selected="selected"';?> >Нет</option>
						</select>

						<br/><br/>

						<input type="submit" name="submit" class"btn btn-default" value="Сохранить">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include_once ROOT.'/views/layouts/footer_admin.php'; ?>