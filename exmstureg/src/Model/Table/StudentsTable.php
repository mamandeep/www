<?php
namespace App\Model\Table;

use Cake\Validation\Validator;
use Cake\ORM\Table;
use Cake\Network\Session;
use DateTime;

class StudentsTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('students');
        $this->setPrimaryKey('id');
        $this->belongsToMany('Courses', [
        		'joinTable' => 'courses_students'
        ]);
        $this->hasOne('Uploadfiles',  [
		    'bindingKey' => ['user_id'],
		    'foreignKey' => ['user_id']
		]);
        $this->hasMany('ExaminationMarks');
		$this->hasMany('CoursesOffered')
			->setForeignKey('programme_id')
        	->setJoinType('INNER');
        $this->hasMany('CoursesStudents');
        $this->addBehavior('Timestamp', [
        		'events' => [
        				'Students.beforeSave' => [
        						'created_at' => 'new',
        						'updated_at' => 'always'
        				]
        		]
        ]);
        
        $this->belongsTo('Users')
        	->setForeignKey('user_id')
        	->setJoinType('INNER');
        $this->belongsTo('Programmes')
        	->setForeignKey('programme_id')
        	->setJoinType('INNER');
        $this->belongsTo('Batches')
        	->setForeignKey('batch_id')
        	->setJoinType('INNER');
    }
    
    public function validationStep1(Validator $validator) {
        /*$validator
            ->requirePresence('name')
            ->notEmpty('name', 'Please fill this field')
            ->add('name', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Z \.]+$/i'),
                    'message' => 'Please enter BLOCK LETTERS only',
                ]
            ])
            ->requirePresence('father_name')
            ->notEmpty('father_name', 'Please fill this field')
            ->add('father_name', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Z \.]+$/i'),
                    'message' => 'Please enter BLOCK LETTERS only',
                ]
            ])
            ->requirePresence('mother_name')
            ->notEmpty('mother_name', 'Please fill this field')
            ->add('mother_name', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Z \.]+$/i'),
                    'message' => 'Please enter BLOCK LETTERS only',
                ]
            ])
                ->allowEmpty('guardian_name')
            ->add('guardian_name', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Z \.]+$/i'),
                    'message' => 'Please enter BLOCK LETTERS only',
                ]
            ])
                ->requirePresence('aadhaar_no')
            ->notEmpty('aadhaar_no', 'Please fill this field')
            ->add('aadhaar_no', [
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9]{12}$/i'),
                    'message' => 'Please enter valid aadhar number (12 digits)',
                ]
            ])
                ->requirePresence('dob')
            ->notEmpty('dob', 'Please fill this field')
            ->add('dob', [
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/i'),
                    'message' => 'Please enter Date of Birth in DD/MM/YYYY format',
                ]
            ])
            ->requirePresence('gender')
            ->notEmpty('gender', 'Please fill this field')
            ->add('gender', [
                'validFormat' => [
                    'rule' => array('custom', '/^Male|Female|Other$/i'),
                    'message' => 'Please select a valid value.',
                ]
            ])
                ->requirePresence('blood_group')
            ->notEmpty('blood_group', 'Please fill this field')
            ->add('blood_group', [
                'validFormat' => [
                    'rule' => array('custom', '/^O−|O+|A−|A+|B−|B+|AB−|AB+|AB+$/i'),
                    'message' => 'Please select a valid value.',
                ]
            ])
                ->requirePresence('permanent_address')
            ->notEmpty('permanent_address', 'Please fill this field')
            ->add('permanent_address', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z0-9 \.]+$/i'),
                    'message' => 'Please do not enter special characters such as @#$% e.t.c.',
                ]
            ])
                ->requirePresence('present_address')
            ->notEmpty('present_address', 'Please fill this field')
            ->add('present_address', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z0-9 \.]+$/i'),
                    'message' => 'Please do not enter special characters such as @#$% e.t.c.',
                ]
            ])
                ->requirePresence('state')
            ->notEmpty('state', 'Please fill this field')
            ->add('state', [
                'validFormat' => [
                    'rule' => array('custom', '/^Andaman and Nicobar Islands|Andhra Pradesh|Arunachal Pradesh|Assam|Bihar|Chandigarh|Chhattisgarh|Dadra and Nagar Haveli|Daman and Diu|Delhi|Goa|Gujarat|Haryana|Himachal Pradesh|Jammu and Kashmir|Jharkhand|Karnataka|Kerala|Lakshadweep|Madhya Pradesh|Maharashtra|Manipur|Meghalaya|Mizoram|Nagaland|Odisha|Puducherry|Punjab|Rajasthan|Sikkim|Tamil Nadu|Telangana|Tripura|Uttar Pradesh|Uttarakhand|West Bengal$/i'),
                    'message' => 'Please select a valid state name',
                ]
            ])
                ->requirePresence('district')
            ->notEmpty('district', 'Please fill this field')
            ->add('district', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z ]+$/i'),
                    'message' => 'Please enter a valid district name',
                ]
            ])
                ->requirePresence('city_village')
            ->notEmpty('city_village', 'Please fill this field')
            ->add('city_village', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z ]+$/i'),
                    'message' => 'Please enter a valid City/Village name',
                ]
            ])
                ->requirePresence('pin_code')
            ->notEmpty('pin_code', 'Please fill this field')
            ->add('pin_code', [
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9]{6}$/i'),
                    'message' => 'Please select a valid pin code',
                ]
            ])
                ->requirePresence('email1')
            ->notEmpty('email1', 'Please fill this field')
            ->add('email1', [
                'correct' => [
                    'rule' => function ($value, $context) {
                        return (!filter_var($value, FILTER_VALIDATE_EMAIL) === false) ? true : false;
                    },
                    'message' => 'The email Id. should be valid. e.g. abc@yahoo.com'
                ]
            ])
                ->requirePresence('email2')
            ->notEmpty('email2', 'Please fill this field')
            ->add('email2', [
                'correct' => [
                    'rule' => function ($value, $context) {
                        return (!filter_var($value, FILTER_VALIDATE_EMAIL) === false) ? true : false;
                    },
                    'message' => 'The email Id. should be valid. e.g. abc@yahoo.com'
                ]
            ]);*/
        return $validator;
    }
    
    public function validationStep2(Validator $validator) {
        /*$validator
                ->requirePresence('nationality')
            ->notEmpty('nationality', 'Please fill this field')
            ->add('nationality', [
                'validFormat' => [
                    'rule' => array('custom', '/^Indian$/i'),
                    'message' => 'Please select a valid Nationality',
                ]
            ])
                ->requirePresence('religion')
            ->notEmpty('religion', 'Please fill this field')
            ->add('religion', [
                'validFormat' => [
                    'rule' => array('custom', '/^Hinduism|Islam|Christianity|Sikhism|Buddhism|Jainism|Other|Not specified$/i'),
                    'message' => 'Please select a valid Religion',
                ]
            ])
                ->requirePresence('category')
            ->notEmpty('category', 'Please fill this field')
            ->add('category', [
                'validFormat' => [
                    'rule' => array('custom', '/^SC|ST|OBC|General$/i'),
                    'message' => 'Please select a valid Category',
                ]
            ])
                ->requirePresence('sub_category')
            ->notEmpty('sub_category', 'Please fill this field')
            ->add('sub_category', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z ]+$/i'),
                    'message' => 'Please enter a valid Sub-category',
                ]
            ])
                ->requirePresence('minority')
            ->notEmpty('minority', 'Please fill this field')
            ->add('minority', [
                'validFormat' => [
                    'rule' => array('custom', '/^Muslim|Sikh|Parsi|Buddhist|Christian|Jain$/i'),
                    'message' => 'Please select a valid Minority',
                ]
            ])
                ->requirePresence('supernumerary')
            ->notEmpty('supernumerary', 'Please fill this field')
            ->add('supernumerary', [
                'validFormat' => [
                    'rule' => array('custom', '/^PWD|WOD|J&K$/i'),
                    'message' => 'Please enter a valid Supernumerary',
                ]
            ])
                ->requirePresence('parents_income')
            ->notEmpty('parents_income', 'Please fill this field')
            ->add('parents_income', [
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9]+$/i'),
                    'message' => 'Please enter numbers only',
                ]
            ])
                ->requirePresence('economically_backward')
            ->notEmpty('economically_backward', 'Please fill this field')
            ->add('economically_backward', [
                'validFormat' => [
                    'rule' => array('custom', '/^Yes|No$/i'),
                    'message' => 'Please select a valid value',
                ]
            ])
                ->requirePresence('economically_backward_detail')
            ->notEmpty('economically_backward_detail', 'Please fill this field')
            ->add('economically_backward_detail', [
                'validFormat' => [
                    'rule' => array('custom', '/^Yellow|BPL$/i'),
                    'message' => 'Please select a valid value',
                ]
            ])
                ->requirePresence('mobile_no')
            ->notEmpty('mobile_no', 'Please fill this field')
            ->add('mobile_no', [
                'validFormat' => [
                    'rule' => array('custom', '/^[6789]{1}[0-9]{9}$/i'),
                    'message' => 'Mobile No. should be 10 digit',
                ]
            ])
                ->requirePresence('emer_contact_no')
            ->notEmpty('emer_contact_no', 'Please fill this field')
            ->add('emer_contact_no', [
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9]+$/i'),
                    'message' => 'Please enter numbers only',
                ],
                'minLength' => [
                    'rule' => ['minLength', 9],
                    'last' => true,
                    'message' => 'The minimum digits criteria is not met'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 11],
                    'message' => 'The digits exceeded in length'
                ]
            ])
                ->requirePresence('emer_name')
            ->notEmpty('emer_name', 'Please fill this field')
            ->add('emer_name', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z ]+$/i'),
                    'message' => 'Please enter alphabets only',
                ],
            ])
                ->requirePresence('emer_relation')
            ->notEmpty('emer_relation', 'Please fill this field')
            ->add('emer_relation', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z ]+$/i'),
                    'message' => 'Please enter alphabets only',
                ],
            ])
                ->requirePresence('hosteler')
            ->notEmpty('hosteler', 'Please fill this field')
            ->add('hosteler', [
                'validFormat' => [
                    'rule' => array('custom', '/^Yes|No$/i'),
                    'message' => 'Please select a valid value',
                ]
            ])
                ->requirePresence('day_scholar')
            ->notEmpty('day_scholar', 'Please fill this field')
            ->add('day_scholar', [
                'validFormat' => [
                    'rule' => array('custom', '/^Yes|No$/i'),
                    'message' => 'Please select a valid value',
                ]
            ])
                ->requirePresence('migration_character')
            ->notEmpty('migration_character', 'Please fill this field')
            ->add('migration_character', [
                'validFormat' => [
                    'rule' => array('custom', '/^Yes|No$/i'),
                    'message' => 'Please select a valid value',
                ]
            ]);*/
        
        return $validator;
    }
    
    public function validationStep4(Validator $validator) {
        /*$validator
                ->requirePresence('ugc_net_subject')
            ->notEmpty('ugc_net_subject', 'Please fill this field')
            ->add('ugc_net_subject', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z0-9 ]+$/i'),
                    'message' => 'Please enter a valid subject name',
                ]
            ])
                ->requirePresence('ugc_net_mnth_yr')
            ->notEmpty('ugc_net_mnth_yr', 'Please fill this field')
            ->add('ugc_net_mnth_yr', [
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9]{4}$/i'),
                    'message' => 'Please enter a valid Year of Passing (YYYY)',
                ]
            ])
                ->requirePresence('ugc_net_rollno')
            ->notEmpty('ugc_net_rollno', 'Please fill this field')
            ->add('ugc_net_rollno', [
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9]+$/i'),
                    'message' => 'Please enter a valid UGC NET Roll No. (Numbers Only)',
                ]
            ])
                ->requirePresence('ugc_net_jrf')
            ->notEmpty('ugc_net_jrf', 'Please fill this field')
            ->add('ugc_net_jrf', [
                'validFormat' => [
                    'rule' => array('custom', '/^Yes|No$/i'),
                    'message' => 'Please select a valid value',
                ]
            ])
                ->requirePresence('ugc_net_net')
            ->notEmpty('ugc_net_net', 'Please fill this field')
            ->add('ugc_net_net', [
                'validFormat' => [
                    'rule' => array('custom', '/^Yes|No$/i'),
                    'message' => 'Please select a valid value',
                ]
            ])
                ->requirePresence('ugc_net_exam_type')
            ->notEmpty('ugc_net_exam_type', 'Please fill this field')
            ->add('ugc_net_exam_type', [
                'validFormat' => [
                    'rule' => array('custom', '/^UGC|CSIR|ICAR|ICMR|GATE|Any Qualifying National Level Test$/i'),
                    'message' => 'Please select a valid value',
                ]
            ])
                ->allowEmpty('ugc_net_any_other_details')
            ->add('ugc_net_any_other_details', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z0-9 ]+$/i'),
                    'message' => 'Please enter alphnumeric values only',
                ]
            ]); */
        return $validator;
    }
    
    public function validationAdmin(Validator $validator) {
        /*$validator
                ->requirePresence('registration_no')
            ->notEmpty('registration_no', 'Please fill this field')
            ->add('registration_no', [
                'validFormat' => [
                    'rule' => array('custom', '/^[1-9]{2}[a-z]{6}[0-9]{2}$/i'),
                    'message' => 'Please enter a valid registration number. (e.g. 17abcdef01)'
                ],
            ])
                ->requirePresence('admission_date')
            ->notEmpty('admission_date', 'Please fill this field')
            ->add('admission_date', [
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/i'),
                    'message' => 'Please enter a valid admission date'
                ],
                'inrange' => [
                    'rule' => function ($value, $context) {
                        $arr = explode('/', $value);
                        $date_entered = date("Y-m-d", strtotime($arr[2]."-".$arr[1]."-".$arr[0]));
                        $date_left = date('Y-m-d', strtotime('-1 years'));
                        $date_right = date('Y-m-d');
                        if ($date_entered > $date_left && $date_entered <= $date_right) {
                            return true;
                        }
                        return false;
                    },
                    'message' => 'The date of admission is not valid.'
                ]
            ])
                ->requirePresence('date_of_completion')
            ->notEmpty('date_of_completion', 'Please fill this field')
            ->add('date_of_completion', [
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/i'),
                    'message' => 'Please enter a valid date of completion',
                ],
                'inrange' => [
                    'rule' => function ($value, $context) {
                        $arr = explode('/', $value);
                        $date_entered = date("Y-m-d", strtotime($arr[2]."-".$arr[1]."-".$arr[0]));
                        $date_left = date('Y-m-d');
                        $date_right = date('Y-m-d', strtotime('+5 years'));
                        if ($date_entered > $date_left && $date_entered <= $date_right) {
                            return true;
                        }
                        return false;
                    },
                    'message' => 'The date of completion is not valid.'
                ]
            ]);
        return $validator;*/
    }
    
    public function validationDefault(Validator $validator)
    {
        /*$validator 
                ->requirePresence('permanent_address')
            ->notEmpty('permanent_address', 'Please fill this field')
            ->add('permanent_address', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z0-9,\. ]+$/i'),
                    'message' => 'Please do not enter characters such as :"?/@#$%^&*\'',
                ]
            ])
                ->requirePresence('present_address')
            ->notEmpty('present_address', 'Please fill this field')
            ->add('present_address', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z0-9,\. ]+$/i'),
                    'message' => 'Please do not enter characters such as :"?/@#$%^&*\'',
                ]
            ])
                ->requirePresence('state')
            ->notEmpty('state', 'Please fill this field')
            ->add('state', [
                'validFormat' => [
                    'rule' => array('custom', '/^Andaman and Nicobar Islands|Andhra Pradesh|Arunachal Pradesh|Assam|Bihar|Chandigarh|Chhattisgarh|Dadra and Nagar Haveli|Daman and Diu|Delhi|Goa|Goa|Gujarat|Haryana|Himachal Pradesh|Jammu and Kashmir|Jharkhand|Karnataka|Kerala|Lakshadweep|Madhya Pradesh|Maharashtra|Manipur|Meghalaya|Mizoram|Nagaland|Odisha|Puducherry|Punjab|Rajasthan|Sikkim|Tamil Nadu|Telangana|Tripura|Uttar Pradesh|Uttarakhand|West Bengal$/i'),
                    'message' => 'Please select a valid State',
                ]
            ])
                ->requirePresence('district')
            ->notEmpty('district', 'Please fill this field')
            ->add('district', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Z ]+$/i'),
                    'message' => 'Please enter district name using alphabets',
                ]
            ])
                ->requirePresence('city_village')
            ->notEmpty('city_village', 'Please fill this field')
            ->add('city_village', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z ]+$/i'),
                    'message' => 'Please enter City/Village using alphabets',
                ]
            ])
                ->requirePresence('pin_code')
            ->notEmpty('pin_code', 'Please fill this field')
            ->add('pin_code', [
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9]+$/i'),
                    'message' => 'Please enter numbers only',
                ]
            ])
                ->requirePresence('email1')
            ->notEmpty('email1', 'Please fill this field')
            ->add('email1', 'validFormat', [
                'rule' => 'email',
                'message' => 'E-mail must be valid'
            ])
                ->requirePresence('email2')
            ->notEmpty('email2', 'Please fill this field')
            ->add('email2', 'validFormat', [
                'rule' => 'email',
                'message' => 'E-mail must be valid'
            ])
                ->requirePresence('mobile_no')
            ->notEmpty('mobile_no', 'Please fill this field')
            ->add('mobile_no', [
                'validFormat' => [
                    'rule' => array('custom', '/^[6789]{1}[0-9]{9}$/i'),
                    'message' => 'Please enter a valid Mobile No.',
                ],
            ])
                ->requirePresence('emer_contact_no')
            ->notEmpty('emer_contact_no', 'Please fill this field')
            ->add('emer_contact_no', [
                'validFormat' => [
                    'rule' => array('custom', '/^[0-9]+$/i'),
                    'message' => 'Please enter numbers only',
                ],
                'minLength' => [
                    'rule' => ['minLength', 9],
                    'last' => true,
                    'message' => 'The minimum digits criteria is not met'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 11],
                    'message' => 'The digits exceeded in length'
                ]
            ])
                ->requirePresence('emer_name')
            ->notEmpty('emer_name', 'Please fill this field')
            ->add('emer_name', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z ]$/i'),
                    'message' => 'Please enter alphabets only',
                ],
            ])
                ->requirePresence('emer_relation')
            ->notEmpty('emer_name', 'Please fill this field')
            ->add('emer_name', [
                'validFormat' => [
                    'rule' => array('custom', '/^[A-Za-z ]$/i'),
                    'message' => 'Please enter alphabets only',
                ],
            ])
                ->requirePresence('hosteler')
            ->notEmpty('hosteler', 'Please fill this field')
            ->add('hosteler', [
                'validFormat' => [
                    'rule' => array('custom', '/^Yes|No$/i'),
                    'message' => 'Please select a valid value',
                ]
            ])
                ->requirePresence('day_scholar')
            ->notEmpty('day_scholar', 'Please fill this field')
            ->add('day_scholar', [
                'validFormat' => [
                    'rule' => array('custom', '/^Yes|No$/i'),
                    'message' => 'Please select a valid value',
                ]
            ])
            ->requirePresence('day_scholar')
            ->notEmpty('day_scholar', 'Please fill this field')
            ->add('day_scholar', [
                'validFormat' => [
                    'rule' => array('custom', '/^Yes|No$/i'),
                    'message' => 'Please select a valid value.',
                ]
            ]);*/
            
        return $validator;
    }
    
    public function isOwnedBy($articleId, $userId)
    {
        return $this->exists(['id' => $articleId, 'user_id' => $userId]);
    }
}
