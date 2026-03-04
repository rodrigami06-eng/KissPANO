<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contacto Model
 *
 * @method \App\Model\Entity\Contacto newEmptyEntity()
 * @method \App\Model\Entity\Contacto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Contacto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contacto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Contacto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Contacto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Contacto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contacto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Contacto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Contacto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contacto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contacto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contacto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contacto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contacto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contacto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contacto> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ContactoTable extends Table
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

        $this->setTable('contacto');
        $this->setDisplayField('Nombre');
        $this->setPrimaryKey('IdContac');
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
            ->maxLength('Nombre', 30, 'longitud campo max. 30')
            ->requirePresence('Nombre', 'create')
            ->notEmptyString('Nombre')
            ->add('Nombre','nombreValido', [
                'rule' => ['custom', '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u'],
                'message' => 'El nombre no debe contener números ni caracteres especiales.'
            ]);

        $validator
            ->scalar('AP')
            ->maxLength('AP', 30, 'longitud campo max. 30')
            ->requirePresence('AP', 'create')
            ->notEmptyString('AP')
            ->add('Nombre','apellidoPValido', [
                'rule' => ['custom', '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u'],
                'message' => 'El nombre no debe contener números ni caracteres especiales.'
            ]);

        $validator
            ->scalar('AM')
            ->maxLength('AM', 30, 'longitud campo max. 30')
            ->allowEmptyString('AM')
            ->add('Nombre','apellidoMValido', [
                'rule' => ['custom', '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u'],
                'message' => 'El nombre no debe contener números ni caracteres especiales.'
            ]);

        $validator
            ->scalar('Tel')
            ->maxLength('Tel', 20, 'Longitud de campo no permitido')
            ->minLength('Tel', 10, 'Longitud del numero no valida')
            ->notEmptyString('Tel');

        $validator
            ->scalar('Encargo')
            ->maxLength('Encargo', 20)
            ->notEmptyString('Encargo');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 50)
            ->requirePresence('Email', 'create')
            ->notEmptyString('Email')
            ->email('email', false, 'Proporciona un correo válido')
            ->add('email', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'Este correo ya está registrado'
            ]);

        $validator
            ->integer('IdProv')
            ->requirePresence('IdProv', 'create')
            ->notEmptyString('IdProv');

        return $validator;
    }
}
