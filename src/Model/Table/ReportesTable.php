<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reportes Model
 *
 * @method \App\Model\Entity\Reporte newEmptyEntity()
 * @method \App\Model\Entity\Reporte newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Reporte> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reporte get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Reporte findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Reporte patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Reporte> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reporte|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Reporte saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Reporte>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reporte>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reporte>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reporte> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reporte>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reporte>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reporte>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reporte> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ReportesTable extends Table
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

        $this->setTable('reportes');
        $this->setDisplayField('IdReporte');
        $this->setPrimaryKey('IdReporte');
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
            ->date('Fecha')
            ->requirePresence('Fecha', 'create')
            ->notEmptyDate('Fecha');

        $validator
            ->decimal('IngresoTotal')
            ->requirePresence('IngresoTotal', 'create')
            ->notEmptyString('IngresoTotal');

        return $validator;
    }
}
