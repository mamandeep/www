<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CoursesOfferedTable extends Table
{
    public function initialize(array $config)
    {
    	parent::initialize($config);
    	
    	$this->setTable('courses_offered');
    	$this->setPrimaryKey(['id']);
    	$this->addBehavior('Timestamp', [
        		'events' => [
        				'CoursesOffered.beforeSave' => [
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
        $this->belongsTo('Courses')
        	->setForeignKey('course_id')
        	->setJoinType('INNER');
		$this->belongsTo('Students')
        	->setForeignKey('programme_id')
        	->setJoinType('INNER');
    }

    public function validationDefault(Validator $validator)
    {
        return $validator;
    }
}

?>