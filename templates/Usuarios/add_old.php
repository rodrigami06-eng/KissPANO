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
            echo $this->Form->control('Nombre',['label' => 'Nombre de Pila']);
            echo $this->Form->control('AP', ['label' => 'Apellido Paterno']);
            echo $this->Form->control('AM', ['label' => 'Apellido Materno']);
            echo $this->Form->control('FechaN', ['type' => 'date', 'label' => 'Fecha de Nacimiento', 'min' => '1920-01-01', 'max' => date('Y-m-d')]);
            echo $this->Form->control('ROL', [
                'type' =>'select',
                'label' => 'Tipo de Rol',
                'options' => [
                    '1' => 'Vendedor',
                    '2' => 'Admin'
                ],
                'empty' => 'Selecciona',
                'class' => 'form-select'
            ]);
            echo $this->Form->control('Email', ['label' => 'Correo Electronico']);
            echo $this->Form->control('Contrasenia', ['type' => 'password', 'label' => 'Contraseña']);
        ?>

        <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-add']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>