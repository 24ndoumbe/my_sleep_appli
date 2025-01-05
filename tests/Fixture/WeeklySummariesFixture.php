<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WeeklySummariesFixture
 */
class WeeklySummariesFixture extends TestFixture
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
                'week_start' => '2024-12-10 10:23:30',
                'week_end' => '2024-12-10 10:23:30',
                'total_sleep_cycles' => 1,
                'days_with_5_cycles' => 1,
                'feeling_score' => 1,
            ],
        ];
        parent::init();
    }
}
