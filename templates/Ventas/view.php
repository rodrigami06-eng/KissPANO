<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venta $venta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Venta'), ['action' => 'edit', $venta->IdVenta], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Venta'), ['action' => 'delete', $venta->IdVenta], ['confirm' => __('Are you sure you want to delete # {0}?', $venta->IdVenta), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Ventas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Venta'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ventas view content">
            <h3><?= h($venta->IdVenta) ?></h3>
            <table>
                <tr>
                    <th><?= __('IdVenta') ?></th>
                    <td><?= $this->Number->format($venta->IdVenta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $this->Number->format($venta->Cantidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $this->Number->format($venta->Total) ?></td>
                </tr>
                <tr>
                    <th><?= __('IdUsuario') ?></th>
                    <td><?= $this->Number->format($venta->IdUsuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('IdProv') ?></th>
                    <td><?= $this->Number->format($venta->IdProv) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($venta->Fecha) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>