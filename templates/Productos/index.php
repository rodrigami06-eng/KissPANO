<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Producto> $productos
 */
?>
<section id="inventario" class="section active">
        <h1>Control de Stock</h1>
        <div class="glass-panel">
            <div class="form-row" style="grid-template-columns: 2fr 1fr 1fr auto;">
                <input type="text" id="i-nom" placeholder="Producto" oninput="soloLetras(this)">
                <input type="number" id="i-price" placeholder="Precio $">
                <input type="number" id="i-qty" placeholder="Existencia">
                <button class="btn btn-add" onclick="addInv()">Guardar</button>
            </div>
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
                    <td><?= $this->Html->image('producto/'.$producto->Imagen)?></td>
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