<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $IdUsuario
 * @property string $Nombre
 * @property string $AP
 * @property string $AM
 * @property \Cake\I18n\Date $FechaN
 * @property string $ROL
 * @property string $Email
 * @property string $Contrasenia
 */
class Usuario extends Entity
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
        'FechaN' => true,
        'ROL' => true,
        'Email' => true,
        'Contrasenia' => true,
    ];

    protected array $_hidden = ['contrasenia'];

    /*protected function _setPassword(string $contrasenia): ?string
    {
        if (strlen($contrasenia) > 0) {
            return (new DefaultPasswordHasher())->hash($contrasenia);
        }
        return $contrasenia;
    }*/

    //Hashear contraseñas
    protected function _setContrasenia(string $contrasenia)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($contrasenia);
    }
}
