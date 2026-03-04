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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $corte->IdCorte],
                ['confirm' => __('Are you sure you want to delete # {0}?', $corte->IdCorte), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Corte'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="corte form content">
            <?= $this->Form->create($corte) ?>
            <fieldset>
                <legend><?= __('Edit Corte') ?></legend>
                <?php
                    echo $this->Form->control('Cantidad');
                    echo $this->Form->control('Fecha');
                    echo $this->Form->control('IdReporte');
                    echo $this->Form->control('IdUsuario');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
