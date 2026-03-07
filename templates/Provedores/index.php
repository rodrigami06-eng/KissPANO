<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Provedore> $provedores
 */
?>

<h1>🚛 Gesti&oacute;n de Proveedores</h1>
<div class="glass-panel">
    <h3>Registrar / Editar Proveedor</h3>
    <?= $this->Form->create($provedore) ?>
        <fieldset >
            <legend>Empresa Proveedor</legend>
            <div class="form-row">
            <?= $this->Form->control('Nombre', ['placeholder' => 'Nombre', 'label' => false]); ?>
            <?= $this->Form->control('Negocio', ['placeholder' => 'Negocio', 'label' => false,]); ?>
            </div>
        </fieldset>
        <fieldset>
            <legend>Direcci&oacute;n de la empresa</legend>
            <div class="form-row">
                <?= $this->Form->control('Calle', ['placeholder' => 'Calle', 'label' => false,]); ?>
                <?= $this->Form->control('Num', ['type' => 'number', 'placeholder' => 'Num. Calle', 'label' => false,]); ?>
            </div>
        </fieldset>
        <?= $this->Form->control('Descrip',['type' => 'textarea', 'placeholder' => 'Descripción de la Empresa', 'label' => false,]); ?>
        <fieldset>
            <legend>Contacto de la empresa</legend>
            <div class="form-row">
            <?= $this->Form->control('contacto.Nombre', ['placeholder' => 'Nombre', 'label' => false]) ?>
            <?= $this->Form->control('contacto.AP', ['placeholder' => 'Ap.Paterno', 'label' => false]) ?>
            <?= $this->Form->control('contacto.AM', ['placeholder' => 'Ap.Materno', 'label' => false]) ?>
            </div>
            <div class="form-row">
            <?= $this->Form->control('contacto.Tel', ['placeholder' => 'Telefono', 'label' => false]) ?>
            <?= $this->Form->control('contacto.Email', ['placeholder' => 'Correo', 'label' => false]) ?>
            </div>
        </fieldset>
    <?= $this->Form->button(__('Agregar'), ['class' => 'btn btn-add']) ?>
    <?= $this->Form->end() ?>
</div>
<div class="glass-panel">
    <table class="std-table">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Nombre', 'Empresa') ?></th>
                <th><?= $this->Paginator->sort('Calle', 'Calle') ?></th>
                <th><?= $this->Paginator->sort('Num', 'N.calle') ?></th>
                <th><?= $this->Paginator->sort('Negocio', 'Negocio') ?></th>
                <th><?= $this->Paginator->sort('Estado', 'Estado') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody id="prov-body">
            <?php foreach ($provedores as $provedore): ?>
                <tr>
                    <td><?= h($provedore->Nombre) ?></td>
                    <td><?= h($provedore->Calle) ?></td>
                    <td><?= h($provedore->Num) ?></td>
                    <td><?= h($provedore->Negocio) ?></td>
                    <td><?= h($provedore->Estado) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $provedore->IdProv, 'class' => 'btn-action']) ?>
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $provedore->IdProv, 'class' => 'btn-action']) ?>
                        <?= $this->Form->postLink(
                            __('🗑️'),
                            ['action' => 'delete', $provedore->IdProv],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $provedore->IdProv),
                                'class' => 'btn-action',
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>