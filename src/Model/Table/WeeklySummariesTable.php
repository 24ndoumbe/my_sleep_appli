<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WeeklySummaries Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\WeeklySummary newEmptyEntity()
 * @method \App\Model\Entity\WeeklySummary newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\WeeklySummary> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WeeklySummary get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\WeeklySummary findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\WeeklySummary patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\WeeklySummary> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\WeeklySummary|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\WeeklySummary saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\WeeklySummary>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WeeklySummary>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\WeeklySummary>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WeeklySummary> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\WeeklySummary>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WeeklySummary>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\WeeklySummary>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WeeklySummary> deleteManyOrFail(iterable $entities, array $options = [])
 */
class WeeklySummariesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('weekly_summaries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->dateTime('week_start')
            ->requirePresence('week_start', 'create')
            ->notEmptyDateTime('week_start');

        $validator
            ->dateTime('week_end')
            ->requirePresence('week_end', 'create')
            ->notEmptyDateTime('week_end');

        $validator
            ->integer('total_sleep_cycles')
            ->requirePresence('total_sleep_cycles', 'create')
            ->notEmptyString('total_sleep_cycles');

        $validator
            ->integer('days_with_5_cycles')
            ->notEmptyString('days_with_5_cycles');

        $validator
            ->integer('feeling_score')
            ->notEmptyString('feeling_score');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
