<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>

<div class="glass-panel">
    <h3 id="u-form-title">Registrar Nuevo Empleado</h3>
    <?= $this->Form->create($usuario) ?>
    <div class="form-row">
        <?php
            echo $this->Form->control('Nombre',['placeholder' => 'Nombre de Pila', 'label'=> false]);
            echo $this->Form->control('AP', ['placeholder' => 'Apellido Paterno', 'label'=> false]);
            echo $this->Form->control('AM', ['placeholder' => 'Apellido Materno', 'label'=> false]);
            echo $this->Form->control('Email', ['placeholder' => 'Correo', 'label'=> false]);
            echo $this->Form->control('Contrasenia', ['type' => 'password', 'placeholder' => 'Contraseña', 'label'=> false]);
            echo $this->Form->control('FechaN', ['type' => 'date', 'placeholder' => 'Fecha Nacimiento', 'min' => '1920-01-01', 'max' => date('Y-m-d'), 'label'=> false]);
            echo $this->Form->control('ROL', [
                'type' =>'select',
                'placeholder' => 'Tipo de Rol',
                'options' => [
                    '1' => 'Vendedor',
                    '2' => 'Admin'
                ],
                'empty' => 'Selecciona',
                'class' => 'form-select',
                'label'=> false
            ]);
        ?>
        <?php ''/*
            echo $this->Form->text('Nombre',['placeholder' => 'Nombre de Pila', 'label' => null, 'id' => 'id-nom']);
            echo $this->Form->text('AP', ['placeholder' => 'Apellido Paterno']);
            echo $this->Form->text('AM', ['placeholder' => 'Apellido Materno']);
            echo $this->Form->text('Email', ['placeholder' => 'Correo']);
            echo $this->Form->password('Contrasenia', ['type' => 'password', 'placeholder' => 'Contraseña']);
            echo $this->Form->date('FechaN', ['type' => 'date', 'placeholder' => 'Fecha Nacimiento', 'min' => '1920-01-01', 'max' => date('Y-m-d')]);
            echo $this->Form->select('ROL', [
                '1' => 'Vendedor',
                '2' => 'Admin'
            ],['empty' => 'Seleccione Rol']);*/
        ?>

        <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-add']) ?>
        
    </div>
    <?= $this->Form->end() ?>
</div>