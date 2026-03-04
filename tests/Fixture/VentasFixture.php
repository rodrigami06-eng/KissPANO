<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VentasFixture
 */
class VentasFixture extends TestFixture
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
                'IdVenta' => 1,
                'Cantidad' => 1,
                'Total' => 1.5,
                'Fecha' => '2026-02-22',
                'IdUsuario' => 1,
                'IdProv' => 1,
            ],
        ];
        parent::init();
    }
}
