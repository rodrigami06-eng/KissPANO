<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactosTable Test Case
 */
class ContactosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContactosTable
     */
    protected $Contactos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Contactos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Contactos') ? [] : ['className' => ContactosTable::class];
        $this->Contactos = $this->getTableLocator()->get('Contactos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Contactos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ContactosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
