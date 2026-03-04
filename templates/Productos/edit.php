<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $producto->IdProducto],
                ['confirm' => __('Are you sure you want to delete # {0}?', $producto->IdProducto), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Productos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="productos form content">
            <?= $this->Form->create($producto, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Producto') ?></legend>
                <?php
                    echo $this->Form->control('Nombre');
                    echo $this->Form->control('Costo');
                    echo $this->Form->control('CantDis');
                    echo $this->Form->control('Imagen', ['type' => 'file', 'required' => false]);
                    echo $this->Form->control('Descrip');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
