<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProgrammesOfferedTable extends Table
{
    public function initialize(array $config)
    {
    	parent::initialize($config);
    	
    	$this->setTable('programmes_offered');
    	$this->setPrimaryKey('id');
    	$this->addBehavior('Timestamp', [
        		'events' => [
        				'ProgrammesOffered.beforeSave' => [
        						'created_at' => 'new',
        						'updated_at' => 'always',
        				]
        		]
        ]);
        
        $this->belongsTo('Users')
        	->setForeignKey('user_id')
        	->setJoinType('INNER');
        $this->belongsTo('Programmes')
        	->setForeignKey('programme_id')
        	->setJoinType('INNER');
        $this->belongsTo('Students')
        	->setForeignKey('student_id')
        	->setJoinType('INNER');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('name')
            ->requirePresence('name')
            ->notEmpty('year')
            ->requirePresence('year');

        return $validator;
    }
}

?>