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
            <?= $this->Html->link(__('List Reporte'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="reporte form content">
            <?= $this->Form->create($reporte) ?>
            <fieldset>
                <legend><?= __('Add Reporte') ?></legend>
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
