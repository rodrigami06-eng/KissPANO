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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reporte->IdReporte],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reporte->IdReporte), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Reportes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="reportes form content">
            <?= $this->Form->create($reporte) ?>
            <fieldset>
                <legend><?= __('Edit Reporte') ?></legend>
                <?php
                    echo $this->Form->control('Fecha');
                    echo $this->Form->control('IngresoTotal');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
