<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provedore $provedore
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $provedore->IdProv],
                ['confirm' => __('Are you sure you want to delete # {0}?', $provedore->IdProv), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Provedores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="provedores form content">
            <?= $this->Form->create($provedore) ?>
            <fieldset>
                <legend><?= __('Edit Provedore') ?></legend>
                <?php
                    echo $this->Form->control('Descrip');
                    echo $this->Form->control('Calle');
                    echo $this->Form->control('Num');
                    echo $this->Form->control('Negocio');
                    echo $this->Form->control('Nombre');
                    echo $this->Form->control('Contrasenia');
                    echo $this->Form->control('Estado');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
