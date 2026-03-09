<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProdVentFixture
 */
class ProdVentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'prod_vent';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'IdProducto' => 1,
                'IdVenta' => 1,
                'Cantidad' => 1,
                'Subtotal' => 1.5,
            ],
        ];
        parent::init();
    }
}
