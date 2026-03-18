
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador - Panadería La Espiga</title>
    <?= $this->html->css('kisslogin.css') ?>
</head>
<body>

	<div class="login-container users form content">
		<div class="logo-container">
			<?= $this->html->image('logopanaderia.png')?>
		</div>
		<?= $this->Flash->render()?>
		<h2>Panel de Control</h2>
		<?= $this->Form->create() ?>
		<p>Ingresa tus credenciales de administrador</p>
		<fieldset>
			<legend><?= __('Ingresa Email y Contraseña') ?></legend>
			<div class="input-group">
				<?= $this->Form->control('Email', ['type' => 'text', 'label' => 'Correo', 'required' => true]) ?>
			</div>

			<div class="input-group">
				<?= $this->Form->control('Contrasenia', ['type' => 'password', 'label' => 'Tu Contraseña', 'required' => true]) ?>
			</div>
		</fieldset>

		<?= $this->Form->button(__('Ingresar')); ?>
		<?= $this->Form->end() ?>

		<div class="footer-links">
			<a href="#">¿Olvidaste la clave?</a>
			<?= $this->Html->link("Registrar Usuarios", ['action' => 'add']) ?>
		</div>
	</div>

</body>
</html>