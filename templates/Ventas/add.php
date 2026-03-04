<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venta $venta
 * @var \App\Model\Entity\Provedore $provedores
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ventas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ventas form content">
            <?= $this->Form->create($venta) ?>
            <fieldset>
                <legend><?= __('Agregar venta') ?></legend>
                <?php
                    echo $this->Form->control('IdProv', [
                        'type' => 'select',
                        'label' => 'Seleccione Proveedor',
                        'options' => $provL,
                        'empty' => 'Selecciona',
                        'class' => 'form-select'
                    ]);
                ?>
                <div id="contain-producto">

                    <button type="Button" id="btn-add-ProdVent" class="btn btn-secondary">
                        Agregar Producto
                    </button>
                    <template id="pv-template">
                        <div class = "p-item border p-3 mb-3">
                            <h5>Otro Producto</h5>
                            <?php
                                echo $this->Form->control('VentProd.{index}.Producto', ['label' => 'Producto']);
                                echo $this->Form->control('VentProd.{index}.Cantidad', ['label' => 'Cantidad']);
                            ?>
                            <button type="button" class="btn btn-danger btn-sm eliminar-prod">Quitar</button>
                        </div>
                    </template>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit'),[]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?=$this->Html->script('agregarFormula', ['block' => true])?>
