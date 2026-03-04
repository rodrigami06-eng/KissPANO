<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactoTable Test Case
 */
class ContactoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContactoTable
     */
    protected $Contacto;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Contacto',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Contacto') ? [] : ['className' => ContactoTable::class];
        $this->Contacto = $this->getTableLocator()->get('Contacto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Contacto);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ContactoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
