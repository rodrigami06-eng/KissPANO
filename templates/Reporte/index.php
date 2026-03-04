<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Reporte> $reporte
 */
?>
<div class="reporte index content">
    <?= $this->Html->link(__('New Reporte'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reporte') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('IdReporte') ?></th>
                    <th><?= $this->Paginator->sort('Fecha') ?></th>
                    <th><?= $this->Paginator->sort('IngresoTotal') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reporte as $reporte): ?>
                <tr>
                    <td><?= $this->Number->format($reporte->IdReporte) ?></td>
                    <td><?= h($reporte->Fecha) ?></td>
                    <td><?= $this->Number->format($reporte->IngresoTotal) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $reporte->IdReporte]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reporte->IdReporte]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $reporte->IdReporte],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $reporte->IdReporte),
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