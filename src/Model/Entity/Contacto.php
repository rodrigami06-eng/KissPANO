<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contacto Entity
 *
 * @property int $IdContac
 * @property string $Nombre
 * @property string $AP
 * @property string|null $AM
 * @property string|null $Tel
 * @property string $Email
 * @property int $IdProv
 */
class Contacto extends Entity
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
        'AP' => true,
        'AM' => true,
        'Tel' => true,
        'Email' => true,
        'IdProv' => true,
    ];
}
