<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contacto> $contactos
 */
?>
<div class="contactos index content">
    <?= $this->Flash->render()?>
    <?= $this->Html->link(__('New Contacto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contactos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('IdContac') ?></th>
                    <th><?= $this->Paginator->sort('Nombre') ?></th>
                    <th><?= $this->Paginator->sort('AP') ?></th>
                    <th><?= $this->Paginator->sort('AM') ?></th>
                    <th><?= $this->Paginator->sort('Tel') ?></th>
                    <th><?= $this->Paginator->sort('Encargo') ?></th>
                    <th><?= $this->Paginator->sort('Email') ?></th>
                    <th><?= $this->Paginator->sort('IdProv') ?></th>
                    <th><?= $this->Paginator->sort('Contrasenia') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactos as $contacto): ?>
                <tr>
                    <td><?= $this->Number->format($contacto->IdContac) ?></td>
                    <td><?= h($contacto->Nombre) ?></td>
                    <td><?= h($contacto->AP) ?></td>
                    <td><?= h($contacto->AM) ?></td>
                    <td><?= h($contacto->Tel) ?></td>
                    <td><?= h($contacto->Encargo) ?></td>
                    <td><?= h($contacto->Email) ?></td>
                    <td><?= $this->Number->format($contacto->IdProv) ?></td>
                    <td><?= h($contacto->Contrasenia) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contacto->IdContac]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contacto->IdContac]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $contacto->IdContac],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $contacto->IdContac),
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