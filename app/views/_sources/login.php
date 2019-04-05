<div class="d-flex justify-content-center">
	<div class="col-md-6 col-md-offset-3">
		<h1><?= HTML::title() ?></h1>
		 <?= $form->open(['action' => '/']) ?>
		  <div class="form-group">
		     <?= $form->text([
		     	'placeholder' => "Введите ваш логин",
		     	'id' => 'username',
		     	'name' => 'username',
		     ], 'Логин');?>
		  </div>
		  <div class="form-group">
		    <?= 
		     $form->input([
		     	 'placeholder' => "Введите ваш пароль",
		     	 'id' => 'password',
		     	 'name' => 'password',
		     	 'class' => 'form-control',
		     	 ], 'password', 'Пароль'); 
		     ?>
		  </div>
		  <!-- csrf Token -->
		  <?= $form->hidden(['name' => '_csrf', 'value' => csrfToken()]) ?>
		  
		  <!-- input button -->
		  <?= $form->button(['class' => 'btn btn-primary'], 'Отправить', 'submit'); ?>
          <?= $form->close() ?>
	</div>
</div>