<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RepVent Model
 *
 * @method \App\Model\Entity\RepVent newEmptyEntity()
 * @method \App\Model\Entity\RepVent newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\RepVent> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RepVent get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\RepVent findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\RepVent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\RepVent> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RepVent|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\RepVent saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\RepVent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RepVent>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RepVent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RepVent> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RepVent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RepVent>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RepVent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RepVent> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RepVentTable extends Table
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

        $this->setTable('rep_vent');
        $this->setDisplayField(['IdReporte', 'IdVenta']);
        $this->setPrimaryKey(['IdReporte', 'IdVenta']);
    }
}
