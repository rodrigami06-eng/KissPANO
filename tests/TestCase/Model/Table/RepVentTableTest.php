<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RepVentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RepVentTable Test Case
 */
class RepVentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RepVentTable
     */
    protected $RepVent;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.RepVent',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RepVent') ? [] : ['className' => RepVentTable::class];
        $this->RepVent = $this->getTableLocator()->get('RepVent', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RepVent);

        parent::tearDown();
    }
}
