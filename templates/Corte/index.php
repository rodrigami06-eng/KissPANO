<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Corte> $corte
 */
?>
<div class="corte index content">
    <?= $this->Html->link(__('New Corte'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Corte') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('IdCorte') ?></th>
                    <th><?= $this->Paginator->sort('Cantidad') ?></th>
                    <th><?= $this->Paginator->sort('Fecha') ?></th>
                    <th><?= $this->Paginator->sort('IdReporte') ?></th>
                    <th><?= $this->Paginator->sort('IdUsuario') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($corte as $corte): ?>
                <tr>
                    <td><?= $this->Number->format($corte->IdCorte) ?></td>
                    <td><?= $this->Number->format($corte->Cantidad) ?></td>
                    <td><?= h($corte->Fecha) ?></td>
                    <td><?= $this->Number->format($corte->IdReporte) ?></td>
                    <td><?= $this->Number->format($corte->IdUsuario) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $corte->IdCorte]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $corte->IdCorte]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $corte->IdCorte],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $corte->IdCorte),
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