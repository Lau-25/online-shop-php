<?php include_once ROOT.'/views/layouts/header_admin.php'; ?>
	
	<section>
		<div class="container">
			<div class="row">
				<br/>

				<div class="breadcrumbs">
					<ol class="breadcrumb">
						<li><a href="/admin">Админпанель</a></li>
						<li class="active">Добавление новой категории</li>
					</ol>
				</div>

				<div class="col-lg-4">
					<div class="login-form">
						<form action="#" method="POST">
							
							<p>Название</p>
							<input type="text" name="name" placeholder="" value="">

							<p>Порядковый номер</p>
							<input type="text" name="sort_order" placeholder="" value="">

							<p>Статус</p>
							<select name="status">
								<option value="1" select="select">Отображать</option>
								<option value="0">Неотображать</option>
							</select>

							<br/><br/>
							<input type="submit" name="submit" value="Сохранить">
						</form>
						<br/><br/>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include_once ROOT.'/views/layouts/footer_admin.php'; ?>