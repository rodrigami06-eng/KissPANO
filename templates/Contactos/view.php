<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contacto $contacto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contacto'), ['action' => 'edit', $contacto->IdContac], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contacto'), ['action' => 'delete', $contacto->IdContac], ['confirm' => __('Are you sure you want to delete # {0}?', $contacto->IdContac), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contactos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contacto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contactos view content">
            <h3><?= h($contacto->Nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($contacto->Nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('AP') ?></th>
                    <td><?= h($contacto->AP) ?></td>
                </tr>
                <tr>
                    <th><?= __('AM') ?></th>
                    <td><?= h($contacto->AM) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tel') ?></th>
                    <td><?= h($contacto->Tel) ?></td>
                </tr>
                <tr>
                    <th><?= __('Encargo') ?></th>
                    <td><?= h($contacto->Encargo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($contacto->Email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contrasenia') ?></th>
                    <td><?= h($contacto->Contrasenia) ?></td>
                </tr>
                <tr>
                    <th><?= __('IdContac') ?></th>
                    <td><?= $this->Number->format($contacto->IdContac) ?></td>
                </tr>
                <tr>
                    <th><?= __('IdProv') ?></th>
                    <td><?= $this->Number->format($contacto->IdProv) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>