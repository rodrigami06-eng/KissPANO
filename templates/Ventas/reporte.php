<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Ventas> $ventas
 */
?>
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
                    <!-- Esto es el ancabezado de los reportes, el diseño incia  mostrar las ventas, por lo que los reportes se deben registrar al generar los reportes -->
                <tr>
                    <th><?= $this->Paginator->sort('IdVenta', 'Folio') ?></th>
                    <th><?= $this->Paginator->sort('Fecha') ?></th>
                    <th><?= $this->Paginator->sort('Usuario.IdUsuario', 'Cajero') ?></th>
                    <th><?= $this->Paginator->sort('Total') ?></th>
                </tr>    
                <!--<tr><th>Folio</th><th>Fecha</th><th>Cajero</th><th>Total</th></tr>-->
                </thead>
                <tbody id="rep-body">
                    <?php foreach($ventas as $venta): ?>
                    <tr data-fecha="<?= $venta->Fecha?>">
                    <td><?= $this->Number->format($venta->IdVenta) ?></td>
                    <td><?= h($venta->Fecha) ?></td>
                    <td><?= h($cajeroL[$venta->IdUsuario]) ?></td>
                    <td style="color:var(--exito); font-weight:bold;">$<?= $this->Number->format($venta->Total) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>