<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
<div class="row">
    <div class="column">
        <div class="glass-panel">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $producto->IdProducto],
                ['confirm' => __('Are you sure you want to delete # {0}?', $producto->IdProducto), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Productos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </div>
    <div class="glass-panel">
        <div class="form-row">
            <?= $this->Form->create($producto, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Editar Producto') ?></legend>
                <?php
                    echo $this->Form->control('Nombre', ['label' => 'Producto', 'placeholder' => '']);
                    echo $this->Form->control('Costo', ['label' => 'Precio', 'placeholder' => '']);
                    echo $this->Form->control('CantDis', ['label' => 'Cantidad en Stock', 'placeholder' => '']);
                    echo $this->Form->control('Imagen', ['type' => 'file', 'placeholder' => 'Seleccione Imagen', 'required' => false, 'label' => 'Seleccione imagen', 'value' => '/img/producto/'.$producto->Imagen]);
                    echo $this->Form->control('Descrip',  ['label' => 'Descripcción de producto', 'placeholder' => 'Escriba acerca del producto']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Cambiar')) ?>
            <?= $this->Html->link(__('Cancelar'),  ['action' => 'index','class' => 'btn btn-add']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
