<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateNaps extends BaseMigration
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
        $table = $this->table('naps');
        $table->addColumn('user_id', 'integer')
        ->addColumn('nap_type', 'string', ['limit' => 50]) // Type de sieste : après-midi, soirée, etc.
        ->addColumn('start_time', 'datetime')  // Heure de début de la sieste
        ->addColumn('end_time', 'datetime')    // Heure de fin de la sieste
        ->addColumn('duration', 'integer')     // Durée de la sieste en minutes
        ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
        ->create();
    }
}
