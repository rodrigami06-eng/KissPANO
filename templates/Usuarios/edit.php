<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<div class="row">
    <div class="row">
        <div class="glass-panel">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $usuario->IdUsuario],
                ['confirm' => __('Seguro que desea eliminar al usuario \n# {0}?', $usuario->Nombre.' '.$usuario->AM), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index', 'class' => 'side-nav-item']) ?>
        </div>
    </div>
    <div class="glass-panel">
        <div class="form-row">
            <?= $this->Form->create($usuario) ?>
            <fieldset>
                <legend><?= __('Editar Usuario') ?></legend>
                <?php
                    echo $this->Form->control('Nombre',['label' => 'Nombre']);
                    echo $this->Form->control('AP',['label' => 'Ap.Paterno']);
                    echo $this->Form->control('AM', ['label' => 'Ap.Materno']);
                    echo $this->Form->control('FechaN', ['type' => 'date' ,'label' => 'Fecha de Nacimiento']);
                    echo $this->Form->control('ROL', [
                        'type' =>'select',
                        'options' => [
                            '1' => 'Vendedor',
                            '2' => 'Admin'
                        ],
                        'empty' => 'Selecciona',
                        'class' => 'form-select',
                        'label'=> 'rol del usuario',
                        'value' => $usuario->ROL
                    ]);
                    echo $this->Form->control('Email', ['label' => 'Correo Electronico']);
                    echo $this->Form->control('Contrasenia',['placeholder' => 'Nueva Contraseña','type' => 'password','label' => 'Contraseña', 'value' => '', 'required' => false]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Cambiar'),  ['class' => 'btn btn-add']) ?>
            <?= $this->Html->link(__('Cancelar'),  ['action' => 'index','class' => 'btn btn-add']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
