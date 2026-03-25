<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Venta> $ventas
 * @var \App\Model\Entity\Provedor $provedor
 */

    $idUsuario = $this->Identity->get('IdUsuario'); 
?>

<?= $this->Flash->render()?>

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
    <h1>🛒 Punto de Venta</h1>
    <div style="display: flex; gap: 10px;">
        <button id="vaciar" style="background:#eee; color:#666; border:none; padding:8px 15px; border-radius:5px; cursor:pointer; font-weight:bold;">🗑️ Vaciar Carrito</button>
    </div>
</div>
<div class="pos-container">
    <?= $this->element('catalog')//Aquí se llama el elemento de catalog para que sea mas dinamico?>
        <?= $this->Form->create($venta,['class' => 'ticket-box'])?>
        <div class="ticket-header">
            <h2 style="margin:0; color:var(--primario); letter-spacing: 2px;">PANADERÍA KISS</h2>
            <p style="margin:5px 0; font-size: 0.8rem; color: #777;">Ticket de Venta Directa</p>
            <small id="cur-date" style="font-weight: bold; color: var(--acento);"></small>
        </div>
        <div class="ticket-scroll">
            <?php 
                echo $this->Form->control('IdProv',[
                    'label' => 'Para:', 
                    'type' => 'select',
                    'options' => $provL,
                    'empty' =>'Provedor',
                    'class' => 'form-select',
                    ]);
                echo $this->Form->control('IdUsuario',['type' => 'hidden', 'value' => $idUsuario]);
            ?>

            <table class="table-pos">
                <thead>
                    <tr><th>Producto</th><th style="text-align:center">Cant.</th><th>Subtotal</th></tr>
                </thead>
            <tbody id="pos-body">
                <template id="ticket-row">
                        <td class="prod-cost">
                            <b>{prod}</b><br>
                            <small>${cost}</small>
                        </td>
                        <td style="text-align:center">
                            <?php
                                echo $this->Form->control('ProdVent.{index}.Cantidad', [
                                    'type' => 'number', 
                                    'label' => false,
                                    'class' => 'cant-prod',
                                    'value' => 1,
                                    ]); 
                                echo $this->Form->control('ProdVent.{index}.IdProducto',[
                                    'type' => 'hidden', 
                                    'value' => '{index}'
                                    ]);
                                echo $this->Form->control('ProdVent.{index}.Subtotal', [
                                    'type' => 'hidden',
                                    'class' => 'sub-in',
                                    'value' => '{cost}'
                                    ])
                            ?>
                        </td>
                        <td class="sub-prod" precio="{cost}">
                            ${cost}
                        </td>
                </template>
            </tbody>
            </table>
            <div id="empty-cart-msg" style="text-align:center; padding:40px; color:#ccc;">
                🛒 El carrito está vacío
            </div>
        </div>
        <div class="ticket-footer">
            <div class="total-line">
                <span>TOTAL</span>
                <span id="pos-total">$0.00</span>
                <?php
                    echo $this->Form->control('Total', ['type' => 'hidden', 'id' => 'total-in', 'value' => 0]);
                ?>
            </div>
            <?= $this->Form->button(__('REALIZAR VENTA'),[
                'class' => 'btn btn-pay', 
                "id" => 'pay-btn'
                ]) ?>
        </div>
        <?= $this->Form->end()?>
    
</div>

<?= $this->Html->script('aniadir-producto.js')?>