<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Provedores Model
 *
 * @method \App\Model\Entity\Provedore newEmptyEntity()
 * @method \App\Model\Entity\Provedore newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Provedore> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Provedore get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Provedore findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Provedore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Provedore> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Provedore|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Provedore saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Provedore>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Provedore>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Provedore>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Provedore> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Provedore>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Provedore>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Provedore>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Provedore> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProvedoresTable extends Table
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

        $this->setTable('provedores');
        $this->setDisplayField('Nombre');
        $this->setPrimaryKey('IdProv');

        $this->hasOne('Contactos', [
            'foreignKey' => 'IdProv',
            'dependent' => true,
            'class' => 'Contactos',
            'propertyName' => 'contacto',
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
            ->scalar('Descrip')
            ->requirePresence('Descrip', 'create')
            ->notEmptyString('Descrip');

        $validator
            ->scalar('Calle')
            ->maxLength('Calle', 40)
            ->requirePresence('Calle', 'create')
            ->notEmptyString('Calle');

        $validator
            ->scalar('Num')
            ->maxLength('Num', 10)
            ->requirePresence('Num', 'create')
            ->notEmptyString('Num');

        $validator
            ->scalar('Negocio')
            ->maxLength('Negocio', 30)
            ->requirePresence('Negocio', 'create')
            ->notEmptyString('Negocio');

        $validator
            ->scalar('Nombre')
            ->maxLength('Nombre', 30)
            ->requirePresence('Nombre', 'create')
            ->notEmptyString('Nombre');

        return $validator;
    }
}
