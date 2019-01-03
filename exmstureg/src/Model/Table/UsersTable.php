<?php

namespace App\Model\Table;

use Cake\Validation\Validator;
use Cake\ORM\Table;

class UsersTable extends Table
{

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
    
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->requirePresence('email')
            ->notEmpty('email', 'Please fill this field')
            ->add('email', [
                'correct' => [
                    'rule' => function ($value, $context) {
                        return (!filter_var($value, FILTER_VALIDATE_EMAIL) === false) ? true : false;
                    },
                    'message' => 'The email I\'d should be valid. e.g. abc@yahoo.com'
                ]
            ])
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author', 'exam', 'student']],
                'message' => 'Please enter a valid role'
            ]);
    }

    public function beforeSave($event, $entity, $options)
    {
        //debug($event); debug($entity); debug($options);
        //$alias = $event->subject()->alias();
        //$users = TableRegistry::get('Users');
        //if (!empty($entity->get['password'])) {
            //$entity->set((new DefaultPasswordHasher())->hash($entity->get['password']));
        //}
        //else {
            //debug($event); debug($entity); debug($options);
            //return false;
        //}
        //return true;
    }
}