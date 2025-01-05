<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NapsFixture
 */
class NapsFixture extends TestFixture
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
                'id' => 1,
                'user_id' => 1,
                'nap_type' => 'Lorem ipsum dolor sit amet',
                'start_time' => '2024-12-10 10:23:39',
                'end_time' => '2024-12-10 10:23:39',
                'duration' => 1,
            ],
        ];
        parent::init();
    }
}
