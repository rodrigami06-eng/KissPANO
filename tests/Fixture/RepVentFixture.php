<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RepVentFixture
 */
class RepVentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'rep_vent';
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
                'IdVenta' => 1,
            ],
        ];
        parent::init();
    }
}
