<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProveedorTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProveedorTable Test Case
 */
class ProveedorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProveedorTable
     */
    protected $Proveedor;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Proveedor',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Proveedor') ? [] : ['className' => ProveedorTable::class];
        $this->Proveedor = $this->getTableLocator()->get('Proveedor', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Proveedor);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ProveedorTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
