<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Venta> $ventas
 */
?>
<div class="ventas index content">
    <?= $this->Html->link(__('New Venta'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ventas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('IdVenta') ?></th>
                    <th><?= $this->Paginator->sort('Cantidad') ?></th>
                    <th><?= $this->Paginator->sort('Total') ?></th>
                    <th><?= $this->Paginator->sort('Fecha') ?></th>
                    <th><?= $this->Paginator->sort('IdUsuario') ?></th>
                    <th><?= $this->Paginator->sort('IdProv') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta): ?>
                <tr>
                    <td><?= $this->Number->format($venta->IdVenta) ?></td>
                    <td><?= $this->Number->format($venta->Cantidad) ?></td>
                    <td><?= $this->Number->format($venta->Total) ?></td>
                    <td><?= h($venta->Fecha) ?></td>
                    <td><?= $this->Number->format($venta->IdUsuario) ?></td>
                    <td><?= $this->Number->format($venta->IdProv) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $venta->IdVenta]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venta->IdVenta]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $venta->IdVenta],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $venta->IdVenta),
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
</div>