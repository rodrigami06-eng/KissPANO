<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Usuario> $usuarios
 */
?>
<section id="usuarios" class="section active">
    <?= $this->Flash->render()?>
    <h1>Gestión de Trabajadores</h1>
    <div class="glass-panel">
    <h3 id="u-form-title">Registrar Nuevo Empleado</h3>
    <?= $this->Form->create($usuario) ?>
    <div>
        <fieldset>
            <div class="form-row">
                <?= $this->Form->control('Nombre',['placeholder' => 'Nombre de Pila', 'label'=> false]) ?>
                <?= $this->Form->control('AP', ['placeholder' => 'Apellido Paterno', 'label'=> false]) ?>
                <?= $this->Form->control('AM', ['placeholder' => 'Apellido Materno', 'label'=> false]) ?>
            </div>
        </fieldset>
        <fieldset>
            <legend>Datos de Sesi&oacute;n</legend>
                <?= $this->Form->control('Email', ['placeholder' => 'Correo', 'label'=> false]) ?>
            <div class="form-row">
                <?= $this->Form->control('FechaN', ['type' => 'date', 'min' => '1920-01-01', 'max' => date('Y-m-d'), 'label'=> 'Fecha de Nacimiento']) ?>
                <?= $this->Form->control('ROL', [
                        'type' =>'select',
                        'label' => 'Tipo de Rol',
                        'options' => [
                            '1' => 'Vendedor',
                            '2' => 'Admin'
                        ],
                        'empty' => 'Selecciona',
                        'class' => 'form-select'
                    ])?>
            </div>
        </fieldset>
        <?= $this->Form->control('Contrasenia', ['type' => 'password', 'placeholder' => 'Contraseña', 'label'=> false]) ?>

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
    <div class="glass-panel">
        <table class = "std-table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('IdUsuario', 'ID') ?></th></th>
                    <th><?= $this->Paginator->sort('Nombre','Nombre Completo').' ' ?>
                    <?= $this->Paginator->sort('AP', 'P').' ' ?>
                    <?= $this->Paginator->sort('AM', 'M') ?></th>
                    <th><?= $this->Paginator->sort('Email', 'Correo Electronico') ?></th>
                    <th><?= $this->Paginator->sort('ROL', 'Rol') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $this->Number->format($usuario->IdUsuario) ?></td>
                    <td><?= h($usuario->Nombre).' ' ?>
                    <?= h($usuario->AP).' ' ?>
                    <?= h($usuario->AM) ?></td>
                    <td><?= h($usuario->Email) ?></td>
                    <td><?= h($usuario->ROL) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $usuario->IdUsuario,  'class' => 'btn-action']) ?>
                        <?= $this->Form->postLink(
                            __('🗑️'),
                            ['action' => 'delete', $usuario->IdUsuario],
                            [
                                'class' => 'btn-action',
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $usuario->IdUsuario),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>