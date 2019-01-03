<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Network\Session;
use DateTime;

class CoursesTable extends Table
{
    public function initialize(array $config)
    {
    	parent::initialize($config);
    	
    	$this->setTable('courses');
    	$this->setPrimaryKey('id');
    	$this->belongsToMany('Students', ['joinTable' => 'courses_students']);
    	$this->hasMany('CoursesOffered');
    	$this->addBehavior('Timestamp', [
        		'events' => [
        				'Courses.beforeSave' => [
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
    }
}

?>