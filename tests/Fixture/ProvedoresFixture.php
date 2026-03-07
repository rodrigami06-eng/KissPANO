<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProvedoresFixture
 */
class ProvedoresFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'IdProv' => 1,
                'Descrip' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'Calle' => 'Lorem ipsum dolor sit amet',
                'Num' => 'Lorem ip',
                'Negocio' => 'Lorem ipsum dolor sit amet',
                'Nombre' => 'Lorem ipsum dolor sit amet',
                'Estado' => 1,
            ],
        ];
        parent::init();
    }
}
