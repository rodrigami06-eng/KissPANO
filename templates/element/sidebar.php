<div class="sidebar">
        <?= $this->NavegaLink->crearLinks()?>

    <?= $this->Html->link('Cerrar Sesión', 'logout',
    ['escape'=> false, 'confirm' => 'Seguro que desea salir?', 'class' => 'btn-logout']
    )?>
</div>