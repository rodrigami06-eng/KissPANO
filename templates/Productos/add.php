<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
<div id="modalPan" class="modal" style="display: block;">
<div class="modal-content row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="productos form content">
            <?= $this->Form->create($producto, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Añadir Producto') ?></legend>
                <?php
                    echo $this->Form->control('Nombre', ['type' =>  'text', 'label' => 'Producto', 'class' => 'form-group']);
                    echo $this->Form->control('Costo', ['type' => 'number', 'label' => 'Precio', 'class' => 'form-group']);
                    echo $this->Form->control('CantDis', ['type' =>  'number', 'label' => 'Stock', 'class' => 'form-group']);
                    echo $this->Form->control('Imagen',['type' =>  'file', 'label' => 'Foto del producto', 'class' => 'form-group']);
                    echo $this->Form->control('Descrip', ['type' =>  'text', 'label' => 'Drescripción del producto', 'class' => 'form-group']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Agregar'),['class' => 'btn-add']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
</div>
