<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CortesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CortesTable Test Case
 */
class CortesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CortesTable
     */
    protected $Cortes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Cortes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Cortes') ? [] : ['className' => CortesTable::class];
        $this->Cortes = $this->getTableLocator()->get('Cortes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cortes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\CortesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
