<?php

    namespace App\View\Helper;

    use Cake\View\Helper;

    class CatalogoHelper extends Helper
    {   

        protected array $helpers = ['Html'];

        /**
         * Summary of mostrarCatalogo
         * @param object $productos
         * @return string
         */
        public function mostrarCatalogo(object $productos): string
        {
            $html = '';
            foreach($productos as $producto){
                $html .= '
                    <div class="prod-card" draggable="false" precio="'.$producto->Costo.'" producto="'.$producto->Nombre.'" id="'.$producto->IdProducto.'">
                        <span class="img-card">'.$this->Html->image('producto/'.$producto->Imagen,['alt' => $producto->Nombre, 'draggable' => 'false']).'</span>
                        <p>'.$producto->Nombre.'</p>
                        <p><b>$'.$producto->Costo.'</b></p>
                    </div>';//'<div class="prod-card" onclick="add('Bolillo', 2.50)"><span>🥖</span>Bolillo<br><b>$2.50</b></div>';
                }
            return $html;
        }
    }