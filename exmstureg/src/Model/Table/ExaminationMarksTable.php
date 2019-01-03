<?php
namespace App\Model\Table;

use Cake\Validation\Validator;
use Cake\ORM\Table;
use Cake\Network\Session;
use DateTime;

class ExaminationMarksTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('examination_marks');
        $this->setPrimaryKey(['student_id', 'course_offered_id']);
        
        $this->addBehavior('Timestamp', [
        		'events' => [
        				'ExaminationMarks.beforeSave' => [
        						'created_at' => 'new',
        						'updated_at' => 'always',
        				]
        		]
        ]);
        
        $this->belongsTo('Users')
        	->setForeignKey('user_id')
        	->setJoinType('INNER');
        $this->belongsTo('Students');
        $this->belongsTo('Programmes')
        	->setForeignKey('programme_id')
        	->setJoinType('INNER');
        $this->belongsTo('Courses')
        	->setForeignKey('course_offered_id')
        	->setJoinType('INNER');
    }
    
    public function validationDefault(Validator $validator) {
        $validator
            ->requirePresence('internal_assessment')
            ->notEmpty('internal_assessment')
            ->add('internal_assessment', 'comparison', [
            		'rule' => function ($value, $context) {
            		return (intval($value) >= 0 && intval($value) <= 25);
            		},
            		'message' => 'The IA must be less than 25 and greater than 0.'
           	])
            ->requirePresence('end_semester_examination')
            ->notEmpty('end_semester_examination')
            ->add('end_semester_examination', 'comparison', [
            		'rule' => function ($value, $context) {
            		return (intval($value) >= 0 && intval($value) <= 75);
            		},
            		'message' => 'The ES must be less than 75 and greater than 0.'
            ]);
        return $validator;
    }
    
    public function validationCustom(Validator $validator) {
    	$validator
    	->requirePresence('total')
    	->notEmpty('total')
    	->add('total', [
    			'validFormat' => [
    					'rule' => array('custom', '/^[A-Z0-9\.]+$/i'),
    					'message' => 'Please enter BLOCK LETTERS or numbers only',
    			]
    	]);
    	return $validator;
    }
}