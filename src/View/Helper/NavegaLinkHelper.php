<?php
    namespace App\View\Helper;

    use Cake\View\Helper;

    class NavegaLinkHelper extends Helper
    {
        protected array $helpers = ['Html'];

        public function configurarNav(): array{
            $menu= array();
                $menuOpcion = array();
                    $menuSubOpcion = array();
            
            $menuOpcion['controller'] = 'Dashboard';
            $menuOpcion['action'] = 'index';
            $menuOpcion['class'] = 'menu-item';
            $menuOpcion['text'] = '🏠 Inicio';
            $menuOpcion['icon'] = '';
            $menu['inicio'] = $menuOpcion;

            $menuOpcion['controller'] = 'Usuarios';
            $menuOpcion['action'] = 'index';
            $menuOpcion['class'] = 'menu-item';
            $menuOpcion['text'] = '👤 Usuarios';
            $menuOpcion['icon'] = '';
            $menu['usuarios'] = $menuOpcion;
            
            $menuOpcion['controller'] = 'Productos';
            $menuOpcion['action'] = 'index';
            $menuOpcion['class'] = 'menu-item';
            $menuOpcion['text'] = '📦 Inventario';
            $menuOpcion['icon'] = '';
            $menu['productos'] = $menuOpcion;

            $menuOpcion['controller'] = 'Ventas';
            $menuOpcion['action'] = 'index';
            $menuOpcion['class'] = 'menu-item';
            $menuOpcion['text'] = '💰 Ventas';
            $menuOpcion['icon'] = '';
            $menu['Ventas'] = $menuOpcion;

            $menuOpcion['controller'] = 'Reportes';
            $menuOpcion['action'] = 'index';
            $menuOpcion['class'] = 'menu-item';
            $menuOpcion['text'] = '📊 Reportes';
            $menuOpcion['icon'] = '';
            $menu['reportes'] = $menuOpcion;

            $menuOpcion['controller'] = 'Provedores';
            $menuOpcion['action'] = 'index';
            $menuOpcion['class'] = 'menu-item';
            $menuOpcion['text'] = '🚛 Proveedores';
            $menuOpcion['icon'] = '';
            $menu['proveedores'] = $menuOpcion;

            return $menu;
        }
        public function crearLinks(): string{
            $menu = $this->configurarNav();

            $html = '<div class="sidebar-header"><h2>PANADERÍA KISS</h2></div>
                <div class="menu-nav">';

                foreach ($menu as $link){
                    $html .= $this->Html->link('<div class="'.$link['class'].'">'.$link['text'].'</div>',
                        ['controller' => $link['controller'], 'action' => $link['action']],
                        ['escape' => false]);
                }

            $html .= '
            </div>';

            return $html;
        }

    }
?>