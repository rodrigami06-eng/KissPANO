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
            <?= $this->Html->link(__('Edit Producto'), ['action' => 'edit', $producto->IdProducto], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Producto'), ['action' => 'delete', $producto->IdProducto], ['confirm' => __('Estas seguro de eliminar # {0}?', $producto->IdProducto), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Productos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Producto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="productos view content">
            <h3><?= h($producto->Nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($producto->Nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imagen') ?></th>
                    <td><?= $this->Html->image('producto/'.$producto->Imagen) ?></td>
                </tr>
                <tr>
                    <th><?= __('IdProducto') ?></th>
                    <td><?= $this->Number->format($producto->IdProducto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Costo') ?></th>
                    <td><?= $this->Number->format($producto->Costo) ?></td>
                </tr>
                <tr>
                    <th><?= __('CantDis') ?></th>
                    <td><?= $this->Number->format($producto->CantDis) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descrip') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($producto->Descrip)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>