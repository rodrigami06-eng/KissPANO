<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Producto> $productos
 */
?>
<div id="inventario" class="content-section productos index content">
    <h3><?= __('Productos') ?></h3>
    <?= $this->Html->link(__('+ Producto'), ['action' => 'add'], ['class' => 'btn-add button float-right']) ?>
    <div class="table-responsive card">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('IdProducto') ?></th>
                    <th><?= $this->Paginator->sort('Nombre') ?></th>
                    <th><?= $this->Paginator->sort('Costo') ?></th>
                    <th><?= $this->Paginator->sort('CantDis') ?></th>
                    <th><?= $this->Paginator->sort('Imagen') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $this->Number->format($producto->IdProducto) ?></td>
                    <td><?= h($producto->Nombre) ?></td>
                    <td><?= $this->Number->format($producto->Costo) ?></td>
                    <td><?= $this->Number->format($producto->CantDis) ?></td>
                    <td><?= $this->Html->image('producto/'.$producto->Imagen)?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $producto->IdProducto]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $producto->IdProducto]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $producto->IdProducto],
                            [
                                'method' => 'delete',
                                'confirm' => __('Desea eliminar Producto # {0}?', $producto->IdProducto),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>

    <? '' ?>
</div>