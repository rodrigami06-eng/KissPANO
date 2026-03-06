<?php

    namespace App\View\Helper;

    use Cake\View\Helper;

    class CatalogoHelper extends Helper
    {   
        public function configCards(): array{
            $productos = 
            $carta = array(); // define a la carta por arreglo
            $fajo = array(); //almacena las cartas en arreglo par ser devuelta en la función
            return $fajo; //devuelve el arreglo del fajo
        }
        public function mostrarCatalogo(array $productos): string
        {   
            $fajoCat = $this->configCards();//llama a la función para obtener las cartas de todos los productos registrados

            $html ='<div class="catalog">';
                $h = '';//'<div class="prod-card" onclick="add('Bolillo', 2.50)"><span>🥖</span>Bolillo<br><b>$2.50</b></div>';

            $html .= '</div>';
            return $html;
        }
    }