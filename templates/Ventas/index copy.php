<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Venta> $ventas
 */
?>

<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
    <h1>🛒 Punto de Venta</h1>
    <div style="display: flex; gap: 10px;">
        <button onclick="clearCart()" style="background:#eee; color:#666; border:none; padding:8px 15px; border-radius:5px; cursor:pointer; font-weight:bold;">🗑️ Vaciar Carrito</button>
    </div>
</div>
<div class="pos-container">
    <div class="catalog">
        <div class="prod-card" onclick="add('Bolillo', 2.50)"><span>🥖</span>Bolillo<br><b>$2.50</b></div>
        <div class="prod-card" onclick="add('Concha', 12.00)"><span>🥐</span>Concha<br><b>$12.00</b></div>
        <div class="prod-card" onclick="add('Dona Glaseada', 15.00)"><span>🍩</span>Dona<br><b>$15.00</b></div>
        <div class="prod-card" onclick="add('Baguette', 35.00)"><span>🥖</span>Baguette<br><b>$35.00</b></div>
        <div class="prod-card" onclick="add('Mantecada', 10.00)"><span>🧁</span>Mantecada<br><b>$10.00</b></div>
        <div class="prod-card" onclick="add('Galleta Chispas', 8.50)"><span>🍪</span>Galleta<br><b>$8.50</b></div>
        <div class="prod-card" onclick="add('Cuernito', 14.00)"><span>🥐</span>Cuernito<br><b>$14.00</b></div>
    </div>

    <div class="ticket-box">
        <div class="ticket-header">
            <h2 style="margin:0; color:var(--primario); letter-spacing: 2px;">PANADERÍA KISS</h2>
            <p style="margin:5px 0; font-size: 0.8rem; color: #777;">Ticket de Venta Directa</p>
            <small id="cur-date" style="font-weight: bold; color: var(--acento);"></small>
        </div>
        <div class="ticket-scroll">
            <table class="table-pos">
                <thead>
                    <tr><th>Producto</th><th style="text-align:center">Cant.</th><th>Subtotal</th></tr>
                </thead>
            <tbody id="pos-body"></tbody>
            </table>
            <div id="empty-cart-msg" style="text-align:center; padding:40px; color:#ccc;">
                🛒 El carrito está vacío
            </div>
        </div>
        <div class="ticket-footer">
            <div class="total-line">
                <span>TOTAL</span>
                <span id="pos-total">$0.00</span>
            </div>
            <button class="btn btn-pay" onclick="pay()">
                <span>✅ FINALIZAR Y GENERAR TICKET</span>
            </button>
        </div>
    </div>
</div>

<div class="ventas index content">
    <?= $this->Html->link(__('New Venta'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ventas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('IdVenta') ?></th>
                    <th><?= $this->Paginator->sort('Cantidad') ?></th>
                    <th><?= $this->Paginator->sort('Total') ?></th>
                    <th><?= $this->Paginator->sort('Fecha') ?></th>
                    <th><?= $this->Paginator->sort('IdUsuario') ?></th>
                    <th><?= $this->Paginator->sort('IdProv') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta): ?>
                <tr>
                    <td><?= $this->Number->format($venta->IdVenta) ?></td>
                    <td><?= $this->Number->format($venta->Cantidad) ?></td>
                    <td><?= $this->Number->format($venta->Total) ?></td>
                    <td><?= h($venta->Fecha) ?></td>
                    <td><?= $this->Number->format($venta->IdUsuario) ?></td>
                    <td><?= $this->Number->format($venta->IdProv) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $venta->IdVenta]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venta->IdVenta]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $venta->IdVenta],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $venta->IdVenta),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>