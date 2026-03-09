<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cortes Model
 *
 * @method \App\Model\Entity\Corte newEmptyEntity()
 * @method \App\Model\Entity\Corte newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Corte> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Corte get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Corte findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Corte patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Corte> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Corte|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Corte saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Corte>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Corte>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Corte>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Corte> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Corte>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Corte>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Corte>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Corte> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CortesTable extends Table
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

        $this->setTable('cortes');
        $this->setDisplayField('IdCorte');
        $this->setPrimaryKey('IdCorte');
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
            ->decimal('Cantidad')
            ->requirePresence('Cantidad', 'create')
            ->notEmptyString('Cantidad');

        $validator
            ->date('Fecha')
            ->requirePresence('Fecha', 'create')
            ->notEmptyDate('Fecha');

        $validator
            ->integer('IdReporte')
            ->requirePresence('IdReporte', 'create')
            ->notEmptyString('IdReporte');

        $validator
            ->integer('IdUsuario')
            ->requirePresence('IdUsuario', 'create')
            ->notEmptyString('IdUsuario');

        return $validator;
    }
}
