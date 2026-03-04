<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReporteFixture
 */
class ReporteFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'reporte';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'IdReporte' => 1,
                'Fecha' => '2026-02-11',
                'IngresoTotal' => 1.5,
            ],
        ];
        parent::init();
    }
}
