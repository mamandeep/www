<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class BatchesTable extends Table
{
    public function initialize(array $config)
    {
    	parent::initialize($config);
    	
    	$this->setTable('batches');
    	$this->setPrimaryKey('id');
    	$this->addBehavior('Timestamp', [
        		'events' => [
        				'Batches.beforeSave' => [
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
            ->notEmpty('year')
            ->requirePresence('year');

        return $validator;
    }
}

?>