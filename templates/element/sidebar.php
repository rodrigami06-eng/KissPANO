<div class="sidebar">
        <?= $this->NavegaLink->crearLinks()?>

    <?= $this->Html->link('Cerrar Sesión', 
    ['controll' => 'Usuarios', 'action' => 'logout'],
    ['escape'=> false, 'confirm' => 'Seguro que desea salir?', 'class' => 'btn-logout']
    )?>
</div>