<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contacto $contacto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contacto->IdContac],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contacto->IdContac), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Contactos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contactos form content">
            <?= $this->Form->create($contacto) ?>
            <fieldset>
                <legend><?= __('Edit Contacto') ?></legend>
                <?php
                    echo $this->Form->control('Nombre');
                    echo $this->Form->control('AP');
                    echo $this->Form->control('AM');
                    echo $this->Form->control('Tel');
                    echo $this->Form->control('Encargo');
                    echo $this->Form->control('Email');
                    echo $this->Form->control('IdProv');
                    echo $this->Form->control('Contrasenia');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
