<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Usuario'), ['action' => 'edit', $usuario->IdUsuario], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Usuario'), ['action' => 'delete', $usuario->IdUsuario], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->IdUsuario), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Usuario'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuarios view content">
            <h3><?= h($usuario->Nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($usuario->Nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('AP') ?></th>
                    <td><?= h($usuario->AP) ?></td>
                </tr>
                <tr>
                    <th><?= __('AM') ?></th>
                    <td><?= h($usuario->AM) ?></td>
                </tr>
                <tr>
                    <th><?= __('ROL') ?></th>
                    <td><?= h($usuario->ROL) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($usuario->Email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contrasenia') ?></th>
                    <td><?= h($usuario->Contrasenia) ?></td>
                </tr>
                <tr>
                    <th><?= __('IdUsuario') ?></th>
                    <td><?= $this->Number->format($usuario->IdUsuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('FechaN') ?></th>
                    <td><?= h($usuario->FechaN) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>