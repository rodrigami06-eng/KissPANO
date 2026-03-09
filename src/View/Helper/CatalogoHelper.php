<?php

    namespace App\View\Helper;

    use Cake\View\Helper;

    class CatalogoHelper extends Helper
    {   

        protected array $helpers = ['Html'];
        public function mostrarCatalogo(object $productos): string
        {
            $html = '';
            foreach($productos as $producto){
                $html .= '
                    <div class="prod-card">
                        <span>'.$this->Html->image('producto/'.$producto->Imagen).'</span>
                        <p class="nombre">'.$producto->Nombre.'</p>
                        <p class ="costo">'.$producto->Costo.'</p>
                    </div>';//'<div class="prod-card" onclick="add('Bolillo', 2.50)"><span>🥖</span>Bolillo<br><b>$2.50</b></div>';
                }
            return $html;
        }
    }