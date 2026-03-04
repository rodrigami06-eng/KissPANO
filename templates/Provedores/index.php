<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Provedore> $provedores
 */
?>
<div class="provedores index content">
    <?= $this->Html->link(__('New Provedore'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Provedores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('IdProv') ?></th>
                    <th><?= $this->Paginator->sort('Calle') ?></th>
                    <th><?= $this->Paginator->sort('Num') ?></th>
                    <th><?= $this->Paginator->sort('Negocio') ?></th>
                    <th><?= $this->Paginator->sort('Nombre') ?></th>
                    <th><?= $this->Paginator->sort('Contrasenia') ?></th>
                    <th><?= $this->Paginator->sort('Estado') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($provedores as $provedore): ?>
                <tr>
                    <td><?= $this->Number->format($provedore->IdProv) ?></td>
                    <td><?= h($provedore->Calle) ?></td>
                    <td><?= h($provedore->Num) ?></td>
                    <td><?= h($provedore->Negocio) ?></td>
                    <td><?= h($provedore->Nombre) ?></td>
                    <td><?= h($provedore->Contrasenia) ?></td>
                    <td><?= h($provedore->Estado) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $provedore->IdProv]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $provedore->IdProv]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $provedore->IdProv],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $provedore->IdProv),
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