<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Usuario> $usuarios
 */
?>
<div class="usuarios index content">
    <?= $this->Html->link(__('New Usuario'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Usuarios') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('IdUsuario') ?></th>
                    <th><?= $this->Paginator->sort('Nombre') ?></th>
                    <th><?= $this->Paginator->sort('AP') ?></th>
                    <th><?= $this->Paginator->sort('AM') ?></th>
                    <th><?= $this->Paginator->sort('FechaN') ?></th>
                    <th><?= $this->Paginator->sort('ROL') ?></th>
                    <th><?= $this->Paginator->sort('Email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $this->Number->format($usuario->IdUsuario) ?></td>
                    <td><?= h($usuario->Nombre) ?></td>
                    <td><?= h($usuario->AP) ?></td>
                    <td><?= h($usuario->AM) ?></td>
                    <td><?= h($usuario->FechaN) ?></td>
                    <td><?= h($usuario->ROL) ?></td>
                    <td><?= h($usuario->Email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $usuario->IdUsuario]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuario->IdUsuario]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $usuario->IdUsuario],
                            [
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