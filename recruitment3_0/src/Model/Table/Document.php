<?php

class Document extends AppModel {

    public $useTable = 'document';
    
    public $validate = array(
        'filename' => array(
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
            'mimeType' => array(
                'rule' => array('mimeType', array('image/gif','image/png', 'image/jpeg', 'image/jpg')),
                'message' => 'Invalid file, only Jpg/Jpeg Images are to be uploaded',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            'fileSize'=> array(
                'rule' => array('fileSize', '<=', '200KB'),
                'message' => 'Image must be less than 200KB.',
                'allowEmpty' => true
            ),
            // custom callback to deal with the file upload
            'processUpload' => array(
                'rule' => 'processUpload',
                'message' => 'Something went wrong processing your file',
                'required' => FALSE,
                'allowEmpty' => TRUE,
                'last' => TRUE,
            )
        ),
        'filename2' => array(
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
            'mimeType' => array(
                'rule' => array('mimeType', array('image/gif','image/png', 'image/jpeg', 'image/jpg', 'application/pdf')),
                'message' => 'Invalid file, only Jpg/Jpeg/gif/png/pdf files are to be uploaded',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            'fileSize'=> array(
                'rule' => array('fileSize', '<=', '200KB'),
                'message' => 'Image must be less than 200KB.',
                'allowEmpty' => true
            ),
            // custom callback to deal with the file upload
            'processUpload' => array(
                'rule' => 'processUpload',
                'message' => 'Something went wrong processing your file',
                'required' => FALSE,
                'allowEmpty' => TRUE,
                'last' => TRUE,
            )
        ),
        'filename3' => array(
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
            'mimeType' => array(
                'rule' => array('mimeType', array('image/gif','image/png', 'image/jpeg', 'image/jpg', 'application/pdf')),
                'message' => 'Invalid file, only Jpg/Jpeg/gif/png/pdf files allowed',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            'fileSize'=> array(
                'rule' => array('fileSize', '<=', '200KB'),
                'message' => 'Image must be less than 200KB.',
                'allowEmpty' => true
            ),
            // custom callback to deal with the file upload
            'processUpload' => array(
                'rule' => 'processUpload',
                'message' => 'Something went wrong processing your file',
                'required' => FALSE,
                'allowEmpty' => TRUE,
                'last' => TRUE,
            )
        ),
        'filename4' => array(
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
            'mimeType' => array(
                'rule' => array('mimeType', array('image/gif','image/png', 'image/jpeg', 'image/jpg')),
                'message' => 'Invalid file, only Jpg/Jpeg images allowed',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            'fileSize'=> array(
                'rule' => array('fileSize', '<=', '200KB'),
                'message' => 'Document must be less than 200kb.',
                'allowEmpty' => true
            ),
            // custom callback to deal with the file upload
            'processUpload' => array(
                'rule' => 'processUpload',
                'message' => 'Something went wrong processing your file',
                'required' => FALSE,
                'allowEmpty' => TRUE,
                'last' => TRUE,
            )
        ),
        'filename5' => array(
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
            'mimeType' => array(
                'rule' => array('mimeType', array('application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')),
                'message' => 'Invalid file, only Word document allowed',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            'fileSize'=> array(
                'rule' => array('fileSize', '<=', '800KB'),
                'message' => 'Document must be less than 800 KB.',
                'allowEmpty' => true
            ),
            // custom callback to deal with the file upload
            'processUpload' => array(
                'rule' => 'processUpload',
                'message' => 'Something went wrong processing your file',
                'required' => FALSE,
                'allowEmpty' => TRUE,
                'last' => TRUE,
            )
        ),
        'filename6' => array(
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
            'mimeType' => array(
                'rule' => array('mimeType', array('application/pdf')),
                'message' => 'Invalid file, only PDF files are to be uploaded',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            'fileSize'=> array(
                'rule' => array('fileSize', '<=', '500KB'),
                'message' => 'Document must be less than 500 KB.',
                'allowEmpty' => true
            ),
            // custom callback to deal with the file upload
            'processUpload' => array(
                'rule' => 'processUpload',
                'message' => 'Something went wrong processing your file',
                'required' => FALSE,
                'allowEmpty' => TRUE,
                'last' => TRUE,
            )
        ),
        'filename7' => array(
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
            /*'mimeType' => array(
                'rule' => array('mimeType', array('application/pdf', 'image/gif','image/png', 'image/jpeg', 'image/jpg')),
                'message' => 'Invalid file type, only JPEG/PNG/GIF/PDF files are allowed',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),*/
            'fileSize'=> array(
                'rule' => array('fileSize', '<=', '200KB'),
                'message' => 'Document must be less than 200 KB.',
                'allowEmpty' => true
            ),
            // custom callback to deal with the file upload
            'processUpload' => array(
                'rule' => 'processUpload',
                'message' => 'Something went wrong processing your file',
                'required' => FALSE,
                'allowEmpty' => TRUE,
                'last' => TRUE,
            )
        ),
        'filename8' => array(
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
            'uploadError' => array(
                'rule' => 'uploadError',
                'message' => 'Something went wrong with the file upload',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            // http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
            'mimeType' => array(
                'rule' => array('mimeType', array('image/gif','image/png', 'image/jpeg', 'image/jpg', 'application/pdf')),
                'message' => 'Invalid file type, only JPEG/PNG/GIF/PDF files are allowed',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            'fileSize'=> array(
                'rule' => array('fileSize', '<=', '200KB'),
                'message' => 'Document must be less than 200 KB.',
                'allowEmpty' => true
            ),
            // custom callback to deal with the file upload
            'processUpload' => array(
                'rule' => 'processUpload',
                'message' => 'Something went wrong processing your file',
                'required' => FALSE,
                'allowEmpty' => TRUE,
                'last' => TRUE,
            )
        )
    );

    /**
     * Upload Directory relative to WWW_ROOT
     * @param string
     */
    public $uploadDir = 'documents';

    /**
     * Process the Upload
     * @param array $check
     * @return boolean
     */
    public function processUpload($check = array()) {
        // deal with uploaded file
        //print_r($this->data[$this->alias]); return false;
        App::uses('CakeSession', 'Model/Datasource');
        $user_id = CakeSession::read('applicant_id');
        if (!empty($check['filename']['tmp_name'])) {

            // check file is uploaded
            if (!is_uploaded_file($check['filename']['tmp_name'])) {
                return FALSE;
            }

            // build full filename
            //$filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(sha1(pathinfo($check['filename']['name'], PATHINFO_FILENAME))) . '.' . pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
            //$filename = WWW_ROOT . $this->uploadDir . DS . $this->generateRandomString() . '.' . pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
            $filename = WWW_ROOT . $this->uploadDir . DS . $user_id . '_photograph.' . pathinfo($check['filename']['name'], PATHINFO_EXTENSION);

            // @todo check for duplicate filename
            // try moving file
            if (!move_uploaded_file($check['filename']['tmp_name'], $filename)) {
                return FALSE;

                // file successfully uploaded
            } else {
                // save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
                $this->data[$this->alias]['filepath'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename));
            }
        }
        
        if (!empty($check['filename2']['tmp_name'])) {

            // check file is uploaded
            if (!is_uploaded_file($check['filename2']['tmp_name'])) {
                return FALSE;
            }

            // build full filename
            //$filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(sha1(pathinfo($check['filename']['name'], PATHINFO_FILENAME))) . '.' . pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
            //$filename = WWW_ROOT . $this->uploadDir . DS . $this->generateRandomString() . '.' . pathinfo($check['filename2']['name'], PATHINFO_EXTENSION);
            $filename = WWW_ROOT . $this->uploadDir . DS . $user_id . '_dateofbirth.' . pathinfo($check['filename2']['name'], PATHINFO_EXTENSION);

            // @todo check for duplicate filename
            // try moving file
            if (!move_uploaded_file($check['filename2']['tmp_name'], $filename)) {
                return FALSE;

                // file successfully uploaded
            } else {
                // save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
                $this->data[$this->alias]['filepath2'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename));
            }
        }
        
        if (!empty($check['filename3']['tmp_name'])) {

            // check file is uploaded
            if (!is_uploaded_file($check['filename3']['tmp_name'])) {
                return FALSE;
            }

            // build full filename
            //$filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(sha1(pathinfo($check['filename']['name'], PATHINFO_FILENAME))) . '.' . pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
            //$filename = WWW_ROOT . $this->uploadDir . DS . $this->generateRandomString() . '.' . pathinfo($check['filename3']['name'], PATHINFO_EXTENSION);
            $filename = WWW_ROOT . $this->uploadDir . DS . $user_id . '_castecert.' . pathinfo($check['filename3']['name'], PATHINFO_EXTENSION);

            // @todo check for duplicate filename
            // try moving file
            if (!move_uploaded_file($check['filename3']['tmp_name'], $filename)) {
                return FALSE;

                // file successfully uploaded
            } else {
                // save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
                $this->data[$this->alias]['filepath3'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename));
            }
        }
        
        if (!empty($check['filename4']['tmp_name'])) {

            // check file is uploaded
            if (!is_uploaded_file($check['filename4']['tmp_name'])) {
                return FALSE;
            }

            // build full filename
            //$filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(sha1(pathinfo($check['filename']['name'], PATHINFO_FILENAME))) . '.' . pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
            //$filename = WWW_ROOT . $this->uploadDir . DS . $this->generateRandomString() . '.' . pathinfo($check['filename4']['name'], PATHINFO_EXTENSION);
            $filename = WWW_ROOT . $this->uploadDir . DS . $user_id . '_signature.' . pathinfo($check['filename4']['name'], PATHINFO_EXTENSION);

            // @todo check for duplicate filename
            // try moving file
            if (!move_uploaded_file($check['filename4']['tmp_name'], $filename)) {
                return FALSE;

                // file successfully uploaded
            } else {
                // save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
                $this->data[$this->alias]['filepath4'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename));
            }
        }
        
        if (!empty($check['filename5']['tmp_name'])) {

            // check file is uploaded
            if (!is_uploaded_file($check['filename5']['tmp_name'])) {
                return FALSE;
            }

            // build full filename
            //$filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(sha1(pathinfo($check['filename']['name'], PATHINFO_FILENAME))) . '.' . pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
            //$filename = WWW_ROOT . $this->uploadDir . DS . $this->generateRandomString() . '.' . pathinfo($check['filename5']['name'], PATHINFO_EXTENSION);
            $filename = WWW_ROOT . $this->uploadDir . DS . $user_id . '_APIProforma.' . pathinfo($check['filename5']['name'], PATHINFO_EXTENSION);

            // @todo check for duplicate filename
            // try moving file
            if (!move_uploaded_file($check['filename5']['tmp_name'], $filename)) {
                return FALSE;

                // file successfully uploaded
            } else {
                // save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
                $this->data[$this->alias]['filepath5'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename));
            }
        }

        if (!empty($check['filename6']['tmp_name'])) {

            // check file is uploaded
            if (!is_uploaded_file($check['filename6']['tmp_name'])) {
                return FALSE;
            }

            // build full filename
            //$filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(sha1(pathinfo($check['filename']['name'], PATHINFO_FILENAME))) . '.' . pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
            //$filename = WWW_ROOT . $this->uploadDir . DS . $this->generateRandomString() . '.' . pathinfo($check['filename6']['name'], PATHINFO_EXTENSION);
            $filename = WWW_ROOT . $this->uploadDir . DS . $user_id . '_qualification.' . pathinfo($check['filename6']['name'], PATHINFO_EXTENSION);

            // @todo check for duplicate filename
            // try moving file
            if (!move_uploaded_file($check['filename6']['tmp_name'], $filename)) {
                return FALSE;

                // file successfully uploaded
            } else {
                // save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
                $this->data[$this->alias]['filepath6'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename));
            }
        }
        
        if (!empty($check['filename7']['tmp_name'])) {

            // check file is uploaded
            if (!is_uploaded_file($check['filename7']['tmp_name'])) {
                return FALSE;
            }

            // build full filename
            //$filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(sha1(pathinfo($check['filename']['name'], PATHINFO_FILENAME))) . '.' . pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
            //$filename = WWW_ROOT . $this->uploadDir . DS . $this->generateRandomString() . '.' . pathinfo($check['filename7']['name'], PATHINFO_EXTENSION);
            $filename = WWW_ROOT . $this->uploadDir . DS . $user_id . '_criteria.' . pathinfo($check['filename7']['name'], PATHINFO_EXTENSION);

            // @todo check for duplicate filename
            // try moving file
            if (!move_uploaded_file($check['filename7']['tmp_name'], $filename)) {
                return FALSE;

                // file successfully uploaded
            } else {
                // save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
                $this->data[$this->alias]['filepath7'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename));
            }
        }
        
        if (!empty($check['filename8']['tmp_name'])) {

            // check file is uploaded
            if (!is_uploaded_file($check['filename8']['tmp_name'])) {
                return FALSE;
            }

            // build full filename
            //$filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(sha1(pathinfo($check['filename']['name'], PATHINFO_FILENAME))) . '.' . pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
            //$filename = WWW_ROOT . $this->uploadDir . DS . $this->generateRandomString() . '.' . pathinfo($check['filename7']['name'], PATHINFO_EXTENSION);
            $filename = WWW_ROOT . $this->uploadDir . DS . $user_id . '_pwdcert.' . pathinfo($check['filename8']['name'], PATHINFO_EXTENSION);

            // @todo check for duplicate filename
            // try moving file
            if (!move_uploaded_file($check['filename8']['tmp_name'], $filename)) {
                return FALSE;

                // file successfully uploaded
            } else {
                // save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
                $this->data[$this->alias]['filepath8'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename));
            }
        }
        
        return TRUE;
    }

    /**
     * Before Save Callback
     * @param array $options
     * @return boolean
     */
    public function beforeSave($options = array()) {
        // a file has been uploaded so grab the filepath
        $this->data[$this->alias]['user_id'] = CakeSession::read('applicant_id');
        if (!empty($this->data[$this->alias]['filepath'])) {
            $this->data[$this->alias]['type'] = $this->data[$this->alias]['filename']['type'];
            $this->data[$this->alias]['size'] = $this->data[$this->alias]['filename']['size'];
            $this->data[$this->alias]['filename'] = $this->data[$this->alias]['filepath'];
               
        }
        
        if (!empty($this->data[$this->alias]['filepath2'])) {
            $this->data[$this->alias]['type2'] = $this->data[$this->alias]['filename2']['type'];
            $this->data[$this->alias]['size2'] = $this->data[$this->alias]['filename2']['size'];
            $this->data[$this->alias]['filename2'] = $this->data[$this->alias]['filepath2'];
        }
        
        if (!empty($this->data[$this->alias]['filepath3'])) {
            $this->data[$this->alias]['type3'] = $this->data[$this->alias]['filename3']['type'];
            $this->data[$this->alias]['size3'] = $this->data[$this->alias]['filename3']['size'];
            $this->data[$this->alias]['filename3'] = $this->data[$this->alias]['filepath3'];
        }
        
        if (!empty($this->data[$this->alias]['filepath4'])) {
            $this->data[$this->alias]['type4'] = $this->data[$this->alias]['filename4']['type'];
            $this->data[$this->alias]['size4'] = $this->data[$this->alias]['filename4']['size'];
            $this->data[$this->alias]['filename4'] = $this->data[$this->alias]['filepath4'];
        }
        
        if (!empty($this->data[$this->alias]['filepath5'])) {
            $this->data[$this->alias]['type5'] = $this->data[$this->alias]['filename5']['type'];
            $this->data[$this->alias]['size5'] = $this->data[$this->alias]['filename5']['size'];
            $this->data[$this->alias]['filename5'] = $this->data[$this->alias]['filepath5'];
        }
        
        if (!empty($this->data[$this->alias]['filepath6'])) {
            $this->data[$this->alias]['type6'] = $this->data[$this->alias]['filename6']['type'];
            $this->data[$this->alias]['size6'] = $this->data[$this->alias]['filename6']['size'];
            $this->data[$this->alias]['filename6'] = $this->data[$this->alias]['filepath6'];
        }
        
        if (!empty($this->data[$this->alias]['filepath7'])) {
            $this->data[$this->alias]['type7'] = $this->data[$this->alias]['filename7']['type'];
            $this->data[$this->alias]['size7'] = $this->data[$this->alias]['filename7']['size'];
            $this->data[$this->alias]['filename7'] = $this->data[$this->alias]['filepath7'];
        }
        
        if (!empty($this->data[$this->alias]['filepath8'])) {
            $this->data[$this->alias]['type8'] = $this->data[$this->alias]['filename8']['type'];
            $this->data[$this->alias]['size8'] = $this->data[$this->alias]['filename8']['size'];
            $this->data[$this->alias]['filename8'] = $this->data[$this->alias]['filepath8'];
        }
        
        return parent::beforeSave($options);
    }
    
    public function beforeValidate($options = array()) {
	// ignore empty file - causes issues with form validation when file is empty and optional
	if (!empty($this->data[$this->alias]['filename']['error']) && $this->data[$this->alias]['filename']['error']==4 && $this->data[$this->alias]['filename']['size']==0) {
		unset($this->data[$this->alias]['filename']);
	}
        if (!empty($this->data[$this->alias]['filename2']['error']) && $this->data[$this->alias]['filename2']['error']==4 && $this->data[$this->alias]['filename2']['size']==0) {
                unset($this->data[$this->alias]['filename2']);
	}
        if (!empty($this->data[$this->alias]['filename3']['error']) && $this->data[$this->alias]['filename3']['error']==4 && $this->data[$this->alias]['filename3']['size']==0) {
                unset($this->data[$this->alias]['filename3']);
	}
        if (!empty($this->data[$this->alias]['filename4']['error']) && $this->data[$this->alias]['filename4']['error']==4 && $this->data[$this->alias]['filename4']['size']==0) {
                unset($this->data[$this->alias]['filename4']);
	}
        if (!empty($this->data[$this->alias]['filename5']['error']) && $this->data[$this->alias]['filename5']['error']==4 && $this->data[$this->alias]['filename5']['size']==0) {
                unset($this->data[$this->alias]['filename5']);
	}
        if (!empty($this->data[$this->alias]['filename6']['error']) && $this->data[$this->alias]['filename6']['error']==4 && $this->data[$this->alias]['filename6']['size']==0) {
                unset($this->data[$this->alias]['filename6']);
	}
        if (!empty($this->data[$this->alias]['filename7']['error']) && $this->data[$this->alias]['filename7']['error']==4 && $this->data[$this->alias]['filename7']['size']==0) {
                unset($this->data[$this->alias]['filename7']);
	}
        if (!empty($this->data[$this->alias]['filename8']['error']) && $this->data[$this->alias]['filename8']['error']==4 && $this->data[$this->alias]['filename8']['size']==0) {
                unset($this->data[$this->alias]['filename8']);
	}

	parent::beforeValidate($options);
    }
    
    function generateRandomString($length = 40) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
?>

