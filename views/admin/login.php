<?php include_once (ROOT.'/views/layouts/header.php'); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 pading-right">
				<div class="signup-form">
					<h2>* Вход в админ панель *</h2>
					<form action="#" method="POST">
						<input type="text" name="login" placeholder="Login" value="<?php echo $login; ?>">
						<input type="text" name="password" placeholder="Password" value="<?php echo $password; ?>">
						<input type="submit" name="submit" class="btn btn-default" value="ВХОД">
					</form>
					<?php if($errors){ echo $errors[0]; } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include_once (ROOT.'/views/layouts/footer.php'); ?>
 