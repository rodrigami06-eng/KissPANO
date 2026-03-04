<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Corte $corte
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Corte'), ['action' => 'edit', $corte->IdCorte], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Corte'), ['action' => 'delete', $corte->IdCorte], ['confirm' => __('Are you sure you want to delete # {0}?', $corte->IdCorte), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Corte'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Corte'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="corte view content">
            <h3><?= h($corte->IdCorte) ?></h3>
            <table>
                <tr>
                    <th><?= __('IdCorte') ?></th>
                    <td><?= $this->Number->format($corte->IdCorte) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $this->Number->format($corte->Cantidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('IdReporte') ?></th>
                    <td><?= $this->Number->format($corte->IdReporte) ?></td>
                </tr>
                <tr>
                    <th><?= __('IdUsuario') ?></th>
                    <td><?= $this->Number->format($corte->IdUsuario) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($corte->Fecha) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>