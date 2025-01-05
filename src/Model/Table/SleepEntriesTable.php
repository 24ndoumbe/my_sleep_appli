<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SleepEntries Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\SleepEntry newEmptyEntity()
 * @method \App\Model\Entity\SleepEntry newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\SleepEntry> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SleepEntry get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\SleepEntry findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\SleepEntry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\SleepEntry> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SleepEntry|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\SleepEntry saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\SleepEntry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SleepEntry>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SleepEntry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SleepEntry> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SleepEntry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SleepEntry>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SleepEntry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SleepEntry> deleteManyOrFail(iterable $entities, array $options = [])
 */
class SleepEntriesTable extends Table
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

        $this->setTable('sleep_entries');
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
            ->dateTime('sleep_start')
            ->requirePresence('sleep_start', 'create')
            ->notEmptyDateTime('sleep_start');

        $validator
            ->dateTime('sleep_end')
            ->requirePresence('sleep_end', 'create')
            ->notEmptyDateTime('sleep_end');

        $validator
            ->boolean('nap')
            ->notEmptyString('nap');

        $validator
            ->integer('feeling')
            ->notEmptyString('feeling');

        $validator
            ->scalar('comment')
            ->allowEmptyString('comment');

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
