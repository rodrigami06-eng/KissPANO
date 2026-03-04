<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $prodVent
 */
?>
<div class="prodVent index content">
    <?= $this->Html->link(__('New Prod Vent'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Prod Vent') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('IdProducto') ?></th>
                    <th><?= $this->Paginator->sort('IdVenta') ?></th>
                    <th><?= $this->Paginator->sort('Cantidad') ?></th>
                    <th><?= $this->Paginator->sort('Subtotal') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prodVent as $prodVent): ?>
                <tr>
                    <td><?= $this->Number->format($prodVent->IdProducto) ?></td>
                    <td><?= $this->Number->format($prodVent->IdVenta) ?></td>
                    <td><?= $this->Number->format($prodVent->Cantidad) ?></td>
                    <td><?= $this->Number->format($prodVent->Subtotal) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $prodVent->IdProducto]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prodVent->IdProducto]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $prodVent->IdProducto],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $prodVent->IdProducto),
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