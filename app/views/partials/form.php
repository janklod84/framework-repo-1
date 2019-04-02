<div class="d-flex justify-content-center">
	<div class="col-m-6 col-md-offset-3">
		<h1>Авторизация</h1>
		 <?= $form->open() ?>
		  <div class="form-group">
		     <?= $form->input(['placeholder' => "Введите ваш логин",'id' => 'login'], 'email', 'Логин');?>
		  </div>
		  <div class="form-group">
		    <?= 
		     $form->input(['placeholder' => "Введите ваш пароль",'id' => 'password'], 'password', 'Пароль'); 
		     ?>
		  </div>
		  <?= $form->button(['class' => 'btn btn-primary'], 'Отправить', 'submit'); ?>
          <?= $form->close() ?>
	</div>
</div>