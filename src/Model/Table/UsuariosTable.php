<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\FrozenTime;

/**
 * Usuarios Model
 *
 * @method \App\Model\Entity\Usuario newEmptyEntity()
 * @method \App\Model\Entity\Usuario newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Usuario> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Usuario findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Usuario> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Usuario saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Usuario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usuario>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Usuario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usuario> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Usuario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usuario>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Usuario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Usuario> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsuariosTable extends Table
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

        $this->setTable('usuarios');
        $this->setDisplayField('Nombre');
        $this->setPrimaryKey('IdUsuario');
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
            ->date('FechaN')
            ->requirePresence('FechaN', 'create')
            ->notEmptyDate('FechaN')
            ->add('FechaN', 'edadMinima', [
                'rule' => function($value, $context){
                    $fechaMin = new FrozenTime('-16 years');

                    $fechaNac = new FrozenTime($value);

                    return $fechaNac <= $fechaMin;
                },
                'message' => 'Solo se permite registrar usuarios de mas de 16 años'
            ]);

        $validator
            ->scalar('ROL')
            ->requirePresence('ROL', 'create')
            //->notEmptyString('ROL')
            ->allowEmptyString('ROL')
            ->inList('ROL',['1', '2'], 'Selecciona una opción');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 50)
            ->requirePresence('Email', 'create')
            ->notEmptyString('Email')
            ->email('Email', false, 'Proporciona un correo válido')
            ->add('Email','EmailValido',[
                'rule' => ['custom', '/^[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}+$/'],
                'message' => 'Correo Electronico no valido'
            ])
            ->add('Email', 'unique', [
                'rule' => 'validateUnique',
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
