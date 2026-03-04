<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VentaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VentaTable Test Case
 */
class VentaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VentaTable
     */
    protected $Venta;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Venta',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Venta') ? [] : ['className' => VentaTable::class];
        $this->Venta = $this->getTableLocator()->get('Venta', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Venta);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\VentaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
