<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateSleepEntries extends BaseMigration
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
        $table = $this->table('sleep_entries');
        $table->addColumn('user_id', 'integer')
              ->addColumn('sleep_start', 'datetime')
              ->addColumn('sleep_end', 'datetime')
              ->addColumn('nap', 'boolean', ['default' => false])
              ->addColumn('feeling', 'integer', ['default' => 0]) // Score de forme de 0 à 10
              ->addColumn('comment', 'text', ['null' => true])
              ->addForeignKey('user_id', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE']);
        $table->create();
    }
}
