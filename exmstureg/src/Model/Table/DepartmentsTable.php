<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class DepartmentsTable extends Table
{
    public function initialize(array $config)
    {
    	parent::initialize($config);
    	
    	$this->setTable('departments');
    	$this->setPrimaryKey('id');
    	
    	
        $this->hasMany('Programmes');
        $this->addBehavior('Timestamp', [
        		'events' => [
        				'Departments.beforeSave' => [
        						'created_at' => 'new',
        						'updated_at' => 'always',
        				]
        		]
        ]);
        
        $this->belongsTo('Users')
        	->setForeignKey('user_id')
        	->setJoinType('INNER');
        $this->belongsTo('Schools')
        	->setForeignKey('school_id');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('name')
            ->requirePresence('name')
            ->notEmpty('school_id')
            ->requirePresence('school_id');

        return $validator;
    }
}

?>