<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reporte $reporte
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reporte'), ['action' => 'edit', $reporte->IdReporte], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reporte'), ['action' => 'delete', $reporte->IdReporte], ['confirm' => __('Are you sure you want to delete # {0}?', $reporte->IdReporte), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reporte'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reporte'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="reporte view content">
            <h3><?= h($reporte->IdReporte) ?></h3>
            <table>
                <tr>
                    <th><?= __('IdReporte') ?></th>
                    <td><?= $this->Number->format($reporte->IdReporte) ?></td>
                </tr>
                <tr>
                    <th><?= __('IngresoTotal') ?></th>
                    <td><?= $this->Number->format($reporte->IngresoTotal) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($reporte->Fecha) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>