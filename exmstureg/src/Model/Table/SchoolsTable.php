<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class SchoolsTable extends Table
{
    public function initialize(array $config)
    {
    	$this->setTable('schools');
    	$this->setPrimaryKey('id');
    	
    	$this->hasMany('Departments');
    	$this->addBehavior('Timestamp', [
    			'events' => [
    					'Schools.beforeSave' => [
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
            ->requirePresence('name');

        return $validator;
    }
}

?>