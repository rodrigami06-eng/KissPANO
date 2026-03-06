<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>

<div class="glass-panel">
    <h3 id="u-form-title">Registrar Nuevo Empleado</h3>
    <div class="form-row">
        <?= $this->Form->create($usuario) ?>
        
        <?php
            echo $this->Form->text('Nombre',['placeholder' => 'Nombre de Pila', 'label' => null, 'id' => 'id-nom']);
            echo $this->Form->text('AP', ['placeholder' => 'Apellido Paterno']);
            echo $this->Form->text('AM', ['placeholder' => 'Apellido Materno']);
            echo $this->Form->text('Email', ['placeholder' => 'Correo']);
            echo $this->Form->password('Contrasenia', ['type' => 'password', 'placeholder' => 'Contraseña']);
            echo $this->Form->date('FechaN', ['type' => 'date', 'placeholder' => 'Fecha Nacimiento', 'min' => '1920-01-01', 'max' => date('Y-m-d')]);
            echo $this->Form->select('ROL', [
                '1' => 'Vendedor',
                '2' => 'Admin'
            ],['empty' => 'Seleccione Rol']);
        ?>

        <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-add']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>