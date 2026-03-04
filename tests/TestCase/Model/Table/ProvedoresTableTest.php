<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProvedoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProvedoresTable Test Case
 */
class ProvedoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProvedoresTable
     */
    protected $Provedores;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Provedores',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Provedores') ? [] : ['className' => ProvedoresTable::class];
        $this->Provedores = $this->getTableLocator()->get('Provedores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Provedores);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ProvedoresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
