<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reporte Entity
 *
 * @property int $IdReporte
 * @property \Cake\I18n\Date $Fecha
 * @property string $IngresoTotal
 */
class Reporte extends Entity
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
        'Fecha' => true,
        'IngresoTotal' => true,
    ];
}
