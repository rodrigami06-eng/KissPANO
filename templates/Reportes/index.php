<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Reporte> $reportes
 */
?>
<div class="reportes index content">
    <?= $this->Html->link(__('New Reporte'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reportes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('IdReporte') ?></th>
                    <th><?= $this->Paginator->sort('Fecha') ?></th>
                    <th><?= $this->Paginator->sort('IngresoTotal') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reportes as $reporte): ?>
                <tr>
                    <td><?= $this->Number->format($reporte->IdReporte) ?></td>
                    <td><?= h($reporte->Fecha) ?></td>
                    <td><?= $this->Number->format($reporte->IngresoTotal) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $reporte->IdReporte]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reporte->IdReporte]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $reporte->IdReporte],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $reporte->IdReporte),
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

 <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <h1>📊 Reporte de Ventas</h1>
            <button class="btn" style="background:var(--acento); color:white;" onclick="exportRepPDF()">📥 Exportar PDF</button>
        </div>
        <div class="glass-panel" style="display:flex; gap:15px; align-items:center;">
            <b>Búsqueda:</b>
            <input type="text" id="f-cajero" placeholder="Folio o Cajero..." onkeyup="filterRep()" style="width:250px;">
            <input type="date" id="f-fecha" onchange="filterRep()" style="width:200px;">
            <button class="btn" onclick="clearFilters()" style="background:#eee; color:#333;">Limpiar</button>
        </div>
        <div class="glass-panel">
            <table class="std-table" id="t-rep">
                <thead>
                    <!-- Esto es el ancabezado de los reportes, el diseño incia  mostrar las ventas, por lo que los reportes se deben registrar al generar los reportes
                    <tr>
                    <th><?= $this->Paginator->sort('IdReporte', 'Folio') ?></th>
                    <th><?= $this->Paginator->sort('Fecha') ?></th>
                    <th><?= $this->Paginator->sort('IngresoTotal') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>-->
                </tr>    
                <tr><th>Folio</th><th>Fecha</th><th>Cajero</th><th>Total</th></tr></thead>
                <tbody id="rep-body"></tbody>
            </table>
        </div>