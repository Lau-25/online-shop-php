<?php include_once ROOT.'/views/layouts/header_admin.php'; ?>
	
	<section>
		<div class="container">
			<div class="row">
				<br/>

				<div class="breadcrumbs">
					<ol class="breadcrumb">
						<li><a href="/admin">Админпанель</a></li>
						<li><a href="/admin/product">Управление категориями</a></li>
						<li class="active">Удалить категорию</li>
					</ol>
				</div>

				<h4>Удалить категорию # <?php echo $id ?></h4>
				<p>Вы действительно хотите удалить категорию???</p>

				<form method="POST" action="#">
					<input type="submit" name="submit" value="Удалить">
				</form>

				<br/>
				<br/>
			</div>
		</div>
	</section>

<?php include_once ROOT.'/views/layouts/footer_admin.php'; ?>