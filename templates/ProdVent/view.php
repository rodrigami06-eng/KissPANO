<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $prodVent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Prod Vent'), ['action' => 'edit', $prodVent->IdProducto], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Prod Vent'), ['action' => 'delete', $prodVent->IdProducto], ['confirm' => __('Are you sure you want to delete # {0}?', $prodVent->IdProducto), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Prod Vent'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Prod Vent'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="prodVent view content">
            <h3><?= h($prodVent->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('IdProducto') ?></th>
                    <td><?= $this->Number->format($prodVent->IdProducto) ?></td>
                </tr>
                <tr>
                    <th><?= __('IdVenta') ?></th>
                    <td><?= $this->Number->format($prodVent->IdVenta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $this->Number->format($prodVent->Cantidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subtotal') ?></th>
                    <td><?= $this->Number->format($prodVent->Subtotal) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>