<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ventas Model
 *
 * @method \App\Model\Entity\Venta newEmptyEntity()
 * @method \App\Model\Entity\Venta newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Venta> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Venta get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Venta findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Venta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Venta> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Venta|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Venta saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Venta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Venta>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Venta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Venta> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Venta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Venta>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Venta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Venta> deleteManyOrFail(iterable $entities, array $options = [])
 */
class VentasTable extends Table
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

        $this->setTable('ventas');
        $this->setDisplayField('IdVenta');
        $this->setPrimaryKey('IdVenta');

        $this->hasMany('ProdVent');
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
            ->integer('Cantidad')
            ->requirePresence('Cantidad', 'create')
            ->notEmptyString('Cantidad');

        $validator
            ->decimal('Total')
            ->requirePresence('Total', 'create')
            ->notEmptyString('Total');

        $validator
            ->date('Fecha')
            ->requirePresence('Fecha', 'create')
            ->notEmptyDate('Fecha');

        $validator
            ->integer('IdUsuario')
            ->requirePresence('IdUsuario', 'create')
            ->notEmptyString('IdUsuario');

        $validator
            ->integer('IdProv')
            ->requirePresence('IdProv', 'create')
            ->notEmptyString('IdProv');

        return $validator;
    }
}
