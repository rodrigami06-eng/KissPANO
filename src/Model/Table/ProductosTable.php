<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productos Model
 *
 * @method \App\Model\Entity\Producto newEmptyEntity()
 * @method \App\Model\Entity\Producto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Producto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Producto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Producto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Producto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Producto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Producto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Producto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Producto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Producto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Producto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Producto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Producto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Producto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Producto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Producto> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProductosTable extends Table
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

        $this->setTable('productos');
        $this->setDisplayField('Nombre');
        $this->setPrimaryKey('IdProducto');
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
            ->scalar('Nombre')
            ->maxLength('Nombre', 20)
            ->requirePresence('Nombre', 'create')
            ->notEmptyString('Nombre')
            ->add('Nombre','nombreValido', [
                'rule' => ['custom', '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u'],
                'message' => 'El nombre no debe contener números ni caracteres especiales.'
            ]);

        $validator
            ->decimal('Costo')
            ->requirePresence('Costo', 'create')
            ->notEmptyString('Costo','Campo requerido');

        $validator
            ->integer('CantDis')
            ->requirePresence('CantDis', 'create')
            ->notEmptyString('CantDis','Campo Requerido');

        $validator
            ->scalar('Imagen')
            ->maxLength('Imagen', 100)
            ->allowEmptyString('Imagen');
            /*->add('foto_perfil', 'valid-image', [
                'rule' => ['uploadedFile', [
                    'types' => ['image/jpeg', 'image/png', 'image/webp'], // Tipos
                    'minSize' => '10K',
                    'maxSize' => '2M',
                ]],
                'message' => 'Por favor, sube una imagen válida (JPG, PNG o WEBP) de máximo 2MB.'
            ])
            ->add('foto_perfil', 'extension', [
                'rule' => ['extension', ['jpg', 'jpeg', 'png', 'webp']],
                'message' => 'La extensión del archivo no es válida.'
            ]);*/

        $validator
            ->scalar('Descrip')
            ->requirePresence('Descrip', 'create')
            ->notEmptyString('Descrip','favor de dar una descripción');

        return $validator;
    }
}
