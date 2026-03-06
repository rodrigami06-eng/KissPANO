<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Usuario> $usuarios
 */
?>
 <div id="usuario" class="content-section active usuarios index content">
    <h3><?= __('Usuarios') ?></h3>
    <?= $this->Html->link(__('+ Usuario'), ['action' => 'add'], ['class' => 'btn-add button float-right']) ?>

    <div class="table-responsive card">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('IdUsuario', 'ID') ?></th></th>
                    <th><?= $this->Paginator->sort('Nombre','Nombre Completo').' ' ?>
                    <?= $this->Paginator->sort('AP', 'P').' ' ?>
                    <?= $this->Paginator->sort('AM', 'M') ?></th>
                    <th><?= $this->Paginator->sort('FechaN','Fecha de Nacimiento') ?></th>
                    <th><?= $this->Paginator->sort('ROL', 'Rol') ?></th>
                    <th><?= $this->Paginator->sort('Email', 'Correo Electronico') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $this->Number->format($usuario->IdUsuario) ?></td>
                    <td><?= h($usuario->Nombre).' ' ?>
                    <?= h($usuario->AP).' ' ?>
                    <?= h($usuario->AM) ?></td>
                    <td><?= h($usuario->FechaN) ?></td>
                    <td><?= h($usuario->ROL) ?></td>
                    <td><?= h($usuario->Email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $usuario->IdUsuario]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $usuario->IdUsuario]) ?>
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
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} registros(s) de {{count}} en total')) ?></p>
    </div>
</div>