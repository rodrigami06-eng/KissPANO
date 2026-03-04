<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReportesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReportesTable Test Case
 */
class ReportesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReportesTable
     */
    protected $Reportes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Reportes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Reportes') ? [] : ['className' => ReportesTable::class];
        $this->Reportes = $this->getTableLocator()->get('Reportes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Reportes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ReportesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
