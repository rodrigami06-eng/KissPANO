<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Producto Entity
 *
 * @property int $IdProducto
 * @property string $Nombre
 * @property string $Costo
 * @property int $CantDis
 * @property string|null $Imagen
 * @property string $Descrip
 */
class Producto extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'Nombre' => true,
        'Costo' => true,
        'CantDis' => true,
        'Imagen' => true,
        'Descrip' => true,
    ];
}
