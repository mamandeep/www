<?php

namespace App\Model\Table;

use Cake\Validation\Validator;
use Cake\ORM\Table;
use Cake\Network\Session;
use \Josegonzalez\Upload\Validation\DefaultValidation;

class UploadfilesTable extends Table
{

    public function initialize(array $config)
    {
    	//debug($temp);
    	$this->table('uploadfiles');
    	$this->displayField('username');
    	$this->primaryKey('id');
    	
    	$this->hasOne('Students', [
		    'bindingKey' => ['user_id'],
		    'foreignKey' => ['user_id']
		]);
    	
    	$this->addBehavior('Josegonzalez/Upload.Upload', [
    			'photo' => [
    					'fields' => [
    							// if these fields or their defaults exist
    							// the values will be set.
    							'dir' => 'photo_path', // defaults to `dir`
    							'size' => 'photo_size', // defaults to `size`
    							'type' => 'photo_type'
						] // defaults to `type`
,
						'nameCallback' => function ($data, $settings) {
							// debug($data); debug($settings);
							$str = 'photo_' . uniqid () . '_' . $data ['name'];
							return strtolower ( $str );
						},
						'path' => 'webroot{DS}uploads{DS}files{DS}',
						'writer' => 'Josegonzalez\Upload\File\Writer\DefaultWriter' 
				]
    	]);
    	$this->addBehavior('Timestamp');
    	//debug($this->Behaviors);
    }
    
    public function validationDefault(Validator $validator)
    {
        $validator->setProvider('upload', new DefaultValidation());
        $validator
	    	->allowEmpty('photo')
                ->add('photo', 'fileUnderPhpSizeLimit', [
                    'rule' => 'isUnderPhpSizeLimit',
                    'message' => 'This file is too large',
                    'provider' => 'upload'
                ])
                ->add('photo', 'fileUnderFormSizeLimit', [
                    'rule' => 'isUnderFormSizeLimit',
                    'message' => 'This file is too large',
                    'provider' => 'upload'
                ])
                ->add('photo', 'fileCompletedUpload', [
                    'rule' => 'isCompletedUpload',
                    'message' => 'This file could not be uploaded completely',
                    'provider' => 'upload'
                ])
                ->add('photo', 'fileSuccessfulWrite', [
                    'rule' => 'isSuccessfulWrite',
                    'message' => 'This upload failed',
                    'provider' => 'upload'
                ])
                ->add('photo', 'fileBelowMaxSize', [
                    'rule' => ['isBelowMaxSize', 2048000],
                    'message' => 'This file is too large',
                    'provider' => 'upload'
                ])
                ->add('photo', 'fileAboveMinSize', [
                    'rule' => ['isAboveMinSize', 51240],
                    'message' => 'This file is too small',
                    'provider' => 'upload'
                ])
                ->add('photo', 'custom', [
                    'rule' => function ($value, $context) {
                        $mimetype = mime_content_type($context['data']['photo']['tmp_name']);
                        if(in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png'))) {
                           return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'The uploaded file is not a valid image.',
                    'on' => function($context) {
                        return !empty($context['data']['photo']) && $context['data']['photo']['error'] == UPLOAD_ERR_OK;
                    }
                ])
	    	/*->allowEmpty('signature')
                ->add('signature', 'fileUnderPhpSizeLimit', [
                    'rule' => 'isUnderPhpSizeLimit',
                    'message' => 'This file is too large',
                    'provider' => 'upload'
                ])
                ->add('signature', 'fileUnderFormSizeLimit', [
                    'rule' => 'isUnderFormSizeLimit',
                    'message' => 'This file is too large',
                    'provider' => 'upload'
                ])
                ->add('signature', 'fileCompletedUpload', [
                    'rule' => 'isCompletedUpload',
                    'message' => 'This file could not be uploaded completely',
                    'provider' => 'upload'
                ])
                ->add('signature', 'fileSuccessfulWrite', [
                    'rule' => 'isSuccessfulWrite',
                    'message' => 'This upload failed',
                    'provider' => 'upload'
                ])
                ->add('signature', 'fileBelowMaxSize', [
                    'rule' => ['isBelowMaxSize', 51200],
                    'message' => 'This file is too large',
                    'provider' => 'upload'
                ])
                ->add('signature', 'fileAboveMinSize', [
                    'rule' => ['isAboveMinSize', 10240],
                    'message' => 'This file is too small',
                    'provider' => 'upload'
                ])
                ->add('signature', 'custom', [
                    'rule' => function ($value, $context) {
                        $mimetype = mime_content_type($context['data']['signature']['tmp_name']);
                        if(in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png'))) {
                           return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'The uploaded file is not a valid image.',
                    'on' => function($context) {
                        return !empty($context['data']['signature']) && $context['data']['signature']['error'] == UPLOAD_ERR_OK;
                    }
                ])*/;         
    	return $validator;
    }
}