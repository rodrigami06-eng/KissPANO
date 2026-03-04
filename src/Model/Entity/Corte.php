<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Corte Entity
 *
 * @property int $IdCorte
 * @property string $Cantidad
 * @property \Cake\I18n\Date $Fecha
 * @property int $IdReporte
 * @property int $IdUsuario
 */
class Corte extends Entity
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
        'Cantidad' => true,
        'Fecha' => true,
        'IdReporte' => true,
        'IdUsuario' => true,
    ];
}
