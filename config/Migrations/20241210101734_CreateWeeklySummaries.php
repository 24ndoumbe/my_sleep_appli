<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateWeeklySummaries extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('weekly_summaries');
        $table->addColumn('user_id', 'integer')
        ->addColumn('week_start', 'datetime')  // Date de début de la semaine
        ->addColumn('week_end', 'datetime')    // Date de fin de la semaine
        ->addColumn('total_sleep_cycles', 'integer') // Nombre total de cycles de sommeil dans la semaine
        ->addColumn('days_with_5_cycles', 'integer', ['default' => 0]) // Nombre de jours où l'utilisateur a eu au moins 5 cycles
        ->addColumn('feeling_score', 'integer', ['default' => 0])  // Moyenne de l'état de forme pour la semaine
        ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
        ->create();
    }
}
