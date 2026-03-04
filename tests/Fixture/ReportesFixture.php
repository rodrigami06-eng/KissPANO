<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReportesFixture
 */
class ReportesFixture extends TestFixture
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
                'IdReporte' => 1,
                'Fecha' => '2026-02-25',
                'IngresoTotal' => 1.5,
            ],
        ];
        parent::init();
    }
}
