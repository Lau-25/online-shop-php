<?php include_once ROOT.'/views/layouts/header_admin.php'; ?>
	
	<section>
		<div class="container">
			<div class="row">
				<br/>

				<div class="breadcrumbs">
					<ol class="breadcrumb">
						<li><a href="/admin">Админпанель</a></li>
						<li class="active">Управление заказами</li>
					</ol>
				</div>

				<a href="/admin/order/create" class="btn btn-default back"><i class="fa fa-plus"></i>Добавить заказ</a>

				<h4>Список заказов :</h4>
				<br/>

				<table class="table-bordered table-striped table">
					<tr>
						<th>ID заказа</th>
						<th>Имя покупателя</th>
						<th>Телефон покупателя</th>
						<th>Дата оформления</th>
						<th>Статус</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>

					<?php foreach($ordersList as $order): ?>
						<tr>
							<td><?php echo $order['id']; ?></td>
							<td><?php echo $order['name_buyer']; ?></td>
							<td><?php echo $order['phone']; ?></td>
							<td><?php echo $order['date_order']; ?></td>
							<td><?php echo $order['status']; ?></td>
							<td><a href="/admin/order/view/<?php echo $order['id']; ?>" title="Просмотреть"><i class="glyphicon glyphicon-eye-open"></i></a></td>
							<td><a href="/admin/order/update/<?php echo $order['id']; ?>" title="Редакторовать"><i class="fa fa-pencil-square"></i></a></td>
							<td><a href="/admin/order/delete/<?php echo $order['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</section>

<?php include_once ROOT.'/views/layouts/footer_admin.php'; ?>