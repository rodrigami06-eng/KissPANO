<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProdVent Model
 *
 * @method \App\Model\Entity\ProdVent newEmptyEntity()
 * @method \App\Model\Entity\ProdVent newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ProdVent> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProdVent get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ProdVent findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ProdVent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ProdVent> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProdVent|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ProdVent saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ProdVent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProdVent>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProdVent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProdVent> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProdVent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProdVent>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ProdVent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ProdVent> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProdVentTable extends Table
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

        $this->setTable('prod_vent');
        $this->setDisplayField(['IdProducto', 'IdVenta']);
        $this->setPrimaryKey(['IdProducto', 'IdVenta']);

        $this->belongsTo('Productos');
        $this->belongsTo('Ventas');
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
            ->decimal('Subtotal')
            ->requirePresence('Subtotal', 'create')
            ->notEmptyString('Subtotal');

        return $validator;
    }
}
