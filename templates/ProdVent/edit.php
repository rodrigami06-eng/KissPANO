<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $prodVent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $prodVent->IdProducto],
                ['confirm' => __('Are you sure you want to delete # {0}?', $prodVent->IdProducto), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Prod Vent'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="prodVent form content">
            <?= $this->Form->create($prodVent) ?>
            <fieldset>
                <legend><?= __('Edit Prod Vent') ?></legend>
                <?php
                    echo $this->Form->control('Cantidad');
                    echo $this->Form->control('Subtotal');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
