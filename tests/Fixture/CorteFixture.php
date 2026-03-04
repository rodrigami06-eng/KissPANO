<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CorteFixture
 */
class CorteFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'corte';
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
                'Fecha' => '2026-02-11',
                'IdReporte' => 1,
                'IdUsuario' => 1,
            ],
        ];
        parent::init();
    }
}
