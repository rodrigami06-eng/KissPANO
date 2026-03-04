<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReporteTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReporteTable Test Case
 */
class ReporteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReporteTable
     */
    protected $Reporte;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Reporte',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Reporte') ? [] : ['className' => ReporteTable::class];
        $this->Reporte = $this->getTableLocator()->get('Reporte', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Reporte);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ReporteTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
