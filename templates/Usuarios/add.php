<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<div id="modalPan" class="modal" style="display: block;">
<div class="modal-content row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuarios form content">
            <?= $this->Form->create($usuario) ?>
            <fieldset>
                <legend><?= __('Registrar Usuario') ?></legend>
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
            </fieldset>
            <?= $this->Form->button(__('Enviar'), ['class' => 'btn-add']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
</div>
