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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $venta->IdVenta],
                ['confirm' => __('Are you sure you want to delete # {0}?', $venta->IdVenta), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ventas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ventas form content">
            <?= $this->Form->create($venta) ?>
            <fieldset>
                <legend><?= __('Edit Venta') ?></legend>
                <?php
                    echo $this->Form->control('Cantidad');
                    echo $this->Form->control('Total');
                    echo $this->Form->control('Fecha');
                    echo $this->Form->control('IdUsuario');
                    echo $this->Form->control('IdProv');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
