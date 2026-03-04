<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContactoFixture
 */
class ContactoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'contacto';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'IdContac' => 1,
                'Nombre' => 'Lorem ipsum dolor sit amet',
                'AP' => 'Lorem ipsum dolor sit amet',
                'AM' => 'Lorem ipsum dolor sit amet',
                'Tel' => 'Lorem ipsum dolor ',
                'Encargo' => 'Lorem ipsum dolor ',
                'Email' => 'Lorem ipsum dolor sit amet',
                'IdProv' => 1,
            ],
        ];
        parent::init();
    }
}
