<?php
namespace App\Model\Table;

use Cake\Validation\Validator;
use Cake\ORM\Table;
use Cake\Network\Session;
use DateTime;

class EducationTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('education');
        $this->setPrimaryKey('id');
        
        $this->addBehavior('Timestamp', [
        		'events' => [
        				'Education.beforeSave' => [
        						'created_at' => 'new',
        						'updated_at' => 'always',
        				]
        		]
        ]);
        $this->belongsTo('Users')
        	->setForeignKey('user_id')
        	->setJoinType('INNER');
        $this->belongsTo('Students')
        	->setForeignKey('student_id')
        	->setJoinType('INNER');
    }
    
    public function validationStep3(Validator $validator) {
        $validator
                ->allowEmpty('qualification')
            ->add('qualification', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z \.]+$/i'),
                    'message' => 'Please enter a valid Qualification name',
                ]
            ])
                ->allowEmpty('course')
            ->add('course', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z \.]+$/i'),
                    'message' => 'Please enter a valid Course name',
                ]
            ])
                ->allowEmpty('board')
            ->add('board', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z \.]+$/i'),
                    'message' => 'Please enter a valid Board name',
                ]
            ])
                ->allowEmpty('mode_of_study')
            ->add('mode_of_study', [
                'validFormat' => [
                    'rule' => array('custom', '/^Regular|Part Time|Distance$/i'),
                    'message' => 'Please enter a valid Mode of Study.',
                ]
            ])
                ->allowEmpty('grade')
            ->add('grade', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Z]+$/i'),
                    'message' => 'Please enter a alphabets only.',
                ]
            ])
                ->allowEmpty('percentage')
            ->add('percentage', [
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9\.]+$/i'),
                    'message' => 'Please enter a valid Percentage value',
                ],
                'minValue' => [
                    'rule' => function ($value, $context) {
                                if($value >= 0) {
                                    return true;
                                }
                                else {
                                    return false;
                                }
                            },
                    'message' => 'The minimum value of the number should be 0.',
                ],
                'maxValue' => [
                    'rule' => function ($value, $context) {
                                if($value <= 100) {
                                    return true;
                                }
                                else {
                                    return false;
                                }
                            },
                    'message' => 'The maximum value of the number should be 100.',
                ]
            ])
                ->allowEmpty('year_of_passing')
            ->add('year_of_passing', [
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9]{4}$/i'),
                    'message' => 'Please enter a valid year of passing (YYYY)',
                ]
            ])
                ->allowEmpty('subjects')
            ->add('subjects', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z ,]+$/i'),
                    'message' => 'Please enter alphabets and , only.',
                ]
            ]);
        return $validator;
    }
}