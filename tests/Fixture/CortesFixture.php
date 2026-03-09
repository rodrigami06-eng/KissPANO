<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CortesFixture
 */
class CortesFixture extends TestFixture
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
                'IdCorte' => 1,
                'Cantidad' => 1.5,
                'Fecha' => '2026-03-08',
                'IdReporte' => 1,
                'IdUsuario' => 1,
            ],
        ];
        parent::init();
    }
}
