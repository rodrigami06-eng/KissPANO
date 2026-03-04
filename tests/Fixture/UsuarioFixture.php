<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuarioFixture
 */
class UsuarioFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'usuario';
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
                'FechaN' => '2026-02-18',
                'ROL' => 'Lorem ipsum dolor ',
                'Email' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
