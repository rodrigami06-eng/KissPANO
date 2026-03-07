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
            echo $this->Form->control('Nombre',['placeholder' => 'Nombre de Pila']);
            echo $this->Form->control('AP', ['placeholder' => 'Apellido Paterno']);
            echo $this->Form->control('AM', ['placeholder' => 'Apellido Materno']);
            echo $this->Form->control('Email', ['placeholder' => 'Correo']);
            echo $this->Form->control('Contrasenia', ['type' => 'password', 'placeholder' => 'Contraseña']);
            echo $this->Form->control('FechaN', ['type' => 'date', 'placeholder' => 'Fecha Nacimiento', 'min' => '1920-01-01', 'max' => date('Y-m-d')]);
            echo $this->Form->control('ROL', [
                'type' =>'select',
                'placeholder' => 'Tipo de Rol',
                'options' => [
                    '1' => 'Vendedor',
                    '2' => 'Admin'
                ],
                'empty' => 'Selecciona',
                'class' => 'form-select'
            ]);
        ?>

        <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-add']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>