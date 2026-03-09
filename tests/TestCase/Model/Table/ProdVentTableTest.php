<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdVentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdVentTable Test Case
 */
class ProdVentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdVentTable
     */
    protected $ProdVent;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.ProdVent',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProdVent') ? [] : ['className' => ProdVentTable::class];
        $this->ProdVent = $this->getTableLocator()->get('ProdVent', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProdVent);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ProdVentTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
