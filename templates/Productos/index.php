<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Producto> $productos
 */
?>
<section id="inventario" class="section active">
    <?= $this->Flash->render()?>
        <h1>Control de Stock</h1>
        <div class="glass-panel">
            <?= $this->Form->create($producto, ['type' => 'file']) ?>
            <div class="form-row" style="grid-template-columns: 2fr 1fr 1fr auto;">
                <?= $this->Form->control('Nombre', ['type' =>  'text', 'placeholder' => 'Producto', 'class' => 'form-group', 'label' => false]);?>
                <?= $this->Form->control('Costo', ['type' => 'number', 'placeholder' => 'Precio', 'class' => 'form-group', 'label' => false]);?>
            </div>
            
            <div class="form-row" style="grid-template-columns: 2fr 1fr 1fr auto;">
                <?= $this->Form->control('CantDis', ['type' =>  'number', 'placeholder' => 'Stock', 'class' => 'form-group', 'label' => false]);?>
                <?= $this->Form->control('Imagen',['type' =>  'file', 'placeholder' => 'Foto del producto', 'class' => 'form-group', 'label' => false]);?>
            </div>

            <div class="form-row" style="grid-template-columns: 2fr 1fr 1fr auto;">
                <?= $this->Form->control('Descrip', ['type' =>  'textarea', 'placeholder' => 'Drescripción del producto', 'class' => 'form-group', 'label' => false]);?>
            </div>
                <?= $this->Form->button(__('Agregar'),['class' => 'btn btn-add']) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="glass-panel">
            <table class="std-table">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Nombre', 'Producto') ?></th>
                    <th><?= $this->Paginator->sort('Costo', 'Precio') ?></th>
                    <th><?= $this->Paginator->sort('CantDis', 'Existencia') ?></th>
                    <th><?= $this->Paginator->sort('Imagen', 'Imagen') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= h($producto->Nombre) ?></td>
                    <td><?= $this->Number->format($producto->Costo) ?></td>
                    <td><?= $this->Number->format($producto->CantDis) ?></td>
                    <td><?= $this->Html->image('producto/'.$producto->Imagen,['class' => 'img-table'])?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $producto->IdProducto, 'class' => 'btn-action']) ?>
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $producto->IdProducto, 'class' => 'btn-action']) ?>
                        <?= $this->Form->postLink(
                            __('🗑️'),
                            ['action' => 'delete', $producto->IdProducto],
                            [
                                'method' => 'delete',
                                'confirm' => __('Desea eliminar Producto # {0}?', $producto->IdProducto),
                                'class' => 'btn-action'
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </div>
    </section>