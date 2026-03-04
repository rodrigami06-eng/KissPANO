<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provedore $provedore
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Provedore'), ['action' => 'edit', $provedore->IdProv], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Provedore'), ['action' => 'delete', $provedore->IdProv], ['confirm' => __('Are you sure you want to delete # {0}?', $provedore->IdProv), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Provedores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Provedore'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="provedores view content">
            <h3><?= h($provedore->Calle) ?></h3>
            <table>
                <tr>
                    <th><?= __('Calle') ?></th>
                    <td><?= h($provedore->Calle) ?></td>
                </tr>
                <tr>
                    <th><?= __('Num') ?></th>
                    <td><?= h($provedore->Num) ?></td>
                </tr>
                <tr>
                    <th><?= __('Negocio') ?></th>
                    <td><?= h($provedore->Negocio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($provedore->Nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contrasenia') ?></th>
                    <td><?= h($provedore->Contrasenia) ?></td>
                </tr>
                <tr>
                    <th><?= __('IdProv') ?></th>
                    <td><?= $this->Number->format($provedore->IdProv) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= $provedore->Estado ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descrip') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($provedore->Descrip)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>