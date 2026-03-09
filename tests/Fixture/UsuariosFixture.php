<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuariosFixture
 */
class UsuariosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'IdUsuario' => 1,
                'Nombre' => 'Lorem ipsum dolor sit amet',
                'AP' => 'Lorem ipsum dolor sit amet',
                'AM' => 'Lorem ipsum dolor sit amet',
                'FechaN' => '2026-03-08',
                'ROL' => 'Lorem ipsum dolor sit amet',
                'Email' => 'Lorem ipsum dolor sit amet',
                'Contrasenia' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
