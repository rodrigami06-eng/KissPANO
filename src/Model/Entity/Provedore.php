<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Provedore Entity
 *
 * @property int $IdProv
 * @property string $Descrip
 * @property string $Calle
 * @property string $Num
 * @property string $Negocio
 * @property string $Nombre
 * @property string $Contrasenia
 * @property bool $Estado
 */
class Provedore extends Entity
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
        'Descrip' => true,
        'Calle' => true,
        'Num' => true,
        'Negocio' => true,
        'Nombre' => true,
        'Contrasenia' => true,
        'Estado' => true,
    ];
}
