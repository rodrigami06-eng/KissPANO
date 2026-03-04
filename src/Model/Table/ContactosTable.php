<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contactos Model
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
class ContactosTable extends Table
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

        $this->setTable('contactos');
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
            ->maxLength('Nombre', 30)
            ->requirePresence('Nombre', 'create')
            ->notEmptyString('Nombre')
            ->add('Nombre','nombreValido', [
                'rule' => ['custom', '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u'],
                'message' => 'El nombre no debe contener números ni caracteres especiales.'
            ]);

        $validator
            ->scalar('AP')
            ->maxLength('AP', 30)
            ->requirePresence('AP', 'create')
            ->notEmptyString('AP')
            ->add('AP','apellidoPValido', [
                'rule' => ['custom', '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u'],
                'message' => 'El apellido no debe contener números ni caracteres especiales.'
            ]);

        $validator
            ->scalar('AM')
            ->maxLength('AM', 30)
            ->requirePresence('AM', 'create')
            ->notEmptyString('AM')
            ->add('AM','apellidoMValido', [
                'rule' => ['custom', '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u'],
                'message' => 'El apellido no debe contener números ni caracteres especiales.'
            ]);

        $validator
            ->scalar('Tel')
            ->maxLength('Tel', 20)
            ->allowEmptyString('Tel');

        $validator
            ->scalar('Encargo')
            ->maxLength('Encargo', 20)
            ->allowEmptyString('Encargo');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 50)
            ->requirePresence('Email', 'create')
            ->notEmptyString('Email');

        $validator
            ->integer('IdProv')
            ->requirePresence('IdProv', 'create')
            ->notEmptyString('IdProv')
            ->add('IdProv', 'exist', [
                'rule' => 'validateExistID',
                'provider' => 'table',
                'message' => 'Este correo ya está registrado'
            ]);

        $validator
            ->scalar('Contrasenia')
            ->maxLength('Contrasenia', 100, 'Longitud exagerada')
            ->requirePresence('Contrasenia', 'create')
            ->notEmptyString('Contrasenia', 'Campo necesario')
            ->minLength('Contrasenia', 8, 'La contraseña debe tener minimo 8 caracteres');

        return $validator;
    }
}
