<?php

namespace App\Model\Table;

use Cake\Validation\Validator;
use Cake\ORM\Table;
use Cake\Network\Session;
use \Josegonzalez\Upload\Validation\DefaultValidation;

class UploadexcelsTable extends Table
{

    public function initialize(array $config)
    {
    	parent::initialize($config);
    	
    	$this->setTable('uploadexcels');
    	$this->setPrimaryKey('id');
    	
    	$this->addBehavior('Josegonzalez/Upload.Upload', [
    			'excelfile' => [
    					'fields' => [
    							// if these fields or their defaults exist
    							// the values will be set.
    							'dir' => 'path', // defaults to `dir`
    							'size' => 'size', // defaults to `size`
    							'type' => 'type'
						] // defaults to `type`
,
						'nameCallback' => function ($data, $settings) {
							// debug($data); debug($settings);
							$str = 'cv_' . uniqid () . '_' . $data ['name'];
							return strtolower ( $str );
						},
						'path' => 'webroot{DS}uploads{DS}files{DS}',
						'writer' => 'Josegonzalez\Upload\File\Writer\DefaultWriter' 
				]
    	]);
    	$this->addBehavior('Timestamp');
    	$this->belongsTo('Users');
    	//debug($this->Behaviors);
    }
    
    public function validationDefault(Validator $validator)
    {
        $validator->setProvider('upload', new DefaultValidation());
        $validator
        	->requirePresence('excelfile')
        	->notEmpty('excelfile')
            ->add('excelfile', 'fileUnderPhpSizeLimit', [
                  'rule' => 'isUnderPhpSizeLimit',
                  'message' => 'This file is too large',
                  'provider' => 'upload'
             ])
             ->add('excelfile', 'fileUnderFormSizeLimit', [
                   'rule' => 'isUnderFormSizeLimit',
                   'message' => 'This file is too large',
                   'provider' => 'upload'
              ])
              ->add('excelfile', 'fileCompletedUpload', [
                    'rule' => 'isCompletedUpload',
                    'message' => 'This file could not be uploaded completely',
                    'provider' => 'upload'
                ])
              ->add('excelfile', 'fileSuccessfulWrite', [
                    'rule' => 'isSuccessfulWrite',
                    'message' => 'This upload failed',
                    'provider' => 'upload'
                ])
              ->add('excelfile', 'fileBelowMaxSize', [
                    'rule' => ['isBelowMaxSize', 102400],
                    'message' => 'This file is too large',
                    'provider' => 'upload'
                ])
              ->add('excelfile', 'fileAboveMinSize', [
                    'rule' => ['isAboveMinSize', 10240],
                    'message' => 'This file is too small',
                    'provider' => 'upload'
                ])
              ->add('excelfile', 'custom', [
                    'rule' => function ($value, $context) {
                        $mimetype = mime_content_type($context['data']['photo']['tmp_name']);
                        if(in_array($mimetype, array('application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'))) {
                           return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'The uploaded file is not an XLSX file.',
                    'on' => function($context) {
                        return !empty($context['data']['excelfile']) && $context['data']['excelfile']['error'] == UPLOAD_ERR_OK;
                    }
                ]);
    	return $validator;
    }
}