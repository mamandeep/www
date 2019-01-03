<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProgrammesTable extends Table
{
    public function initialize(array $config)
    {
    	$this->setTable('programmes');
    	$this->setPrimaryKey('id');
    	
    	$this->belongsTo('Departments');
    	$this->belongsTo('Sessions');
    	$this->hasMany('Courses');
    	$this->hasMany('CoursesOffered');
    	$this->addBehavior('Timestamp', [
    			'events' => [
    					'Programmes.beforeSave' => [
    							'created_at' => 'new',
    							'updated_at' => 'always',
    					]
    			]
    	]);
    	
    	$this->belongsTo('Users')
    		->setForeignKey('user_id')
    	->setJoinType('INNER');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('name')
            ->requirePresence('name')
            ->notEmpty('degree')
            ->requirePresence('degree')
            ->notEmpty('department_id')
            ->requirePresence('department_id');

        return $validator;
    }
}

?>