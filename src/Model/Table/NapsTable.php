<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Naps Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Nap newEmptyEntity()
 * @method \App\Model\Entity\Nap newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Nap> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nap get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Nap findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Nap patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Nap> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nap|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Nap saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Nap>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Nap>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Nap>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Nap> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Nap>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Nap>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Nap>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Nap> deleteManyOrFail(iterable $entities, array $options = [])
 */
class NapsTable extends Table
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

        $this->setTable('naps');
        $this->setDisplayField('nap_type');
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
            ->scalar('nap_type')
            ->maxLength('nap_type', 50)
            ->requirePresence('nap_type', 'create')
            ->notEmptyString('nap_type');

        $validator
            ->dateTime('start_time')
            ->requirePresence('start_time', 'create')
            ->notEmptyDateTime('start_time');

        $validator
            ->dateTime('end_time')
            ->requirePresence('end_time', 'create')
            ->notEmptyDateTime('end_time');

        $validator
            ->integer('duration')
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

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
