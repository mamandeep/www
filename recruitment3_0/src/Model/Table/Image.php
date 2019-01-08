<?php

class Image extends AppModel {

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
                'rule' => array('mimeType', array('image/gif','image/png', 'image/jpeg', 'image/jpg')),
                'message' => 'Invalid file, only Jpg/Jpeg Images allowed',
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
                'message' => 'Invalid file, only Jpg/Jpeg Images allowed',
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
        /*'filename5' => array(
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
                'message' => 'Invalid file, only Word Document allowed',
                'required' => FALSE,
                'allowEmpty' => TRUE,
            ),
            'fileSize'=> array(
                'rule' => array('fileSize', '<=', '5MB'),
                'message' => 'Document must be less than 5MB.',
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
        )*/
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
        if (!empty($check['filename']['tmp_name'])) {

            // check file is uploaded
            if (!is_uploaded_file($check['filename']['tmp_name'])) {
                return FALSE;
            }

            // build full filename
            //$filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(sha1(pathinfo($check['filename']['name'], PATHINFO_FILENAME))) . '.' . pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
            $filename = WWW_ROOT . $this->uploadDir . DS . $this->generateRandomString() . '.' . pathinfo($check['filename']['name'], PATHINFO_EXTENSION);

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
            $filename = WWW_ROOT . $this->uploadDir . DS . $this->generateRandomString() . '.' . pathinfo($check['filename2']['name'], PATHINFO_EXTENSION);

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
            $filename = WWW_ROOT . $this->uploadDir . DS . $this->generateRandomString() . '.' . pathinfo($check['filename3']['name'], PATHINFO_EXTENSION);

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
            $filename = WWW_ROOT . $this->uploadDir . DS . $this->generateRandomString() . '.' . pathinfo($check['filename4']['name'], PATHINFO_EXTENSION);

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
        
        /*if (!empty($check['filename5']['tmp_name'])) {

            // check file is uploaded
            if (!is_uploaded_file($check['filename5']['tmp_name'])) {
                return FALSE;
            }

            // build full filename
            //$filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(sha1(pathinfo($check['filename']['name'], PATHINFO_FILENAME))) . '.' . pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
            $filename = WWW_ROOT . $this->uploadDir . DS . $this->generateRandomString() . '.' . pathinfo($check['filename5']['name'], PATHINFO_EXTENSION);

            // @todo check for duplicate filename
            // try moving file
            if (!move_uploaded_file($check['filename5']['tmp_name'], $filename)) {
                return FALSE;

                // file successfully uploaded
            } else {
                // save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
                $this->data[$this->alias]['filepath5'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename));
            }
        }*/

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
        
        /*if (!empty($this->data[$this->alias]['filepath5'])) {
            $this->data[$this->alias]['type5'] = $this->data[$this->alias]['filename5']['type'];
            $this->data[$this->alias]['size5'] = $this->data[$this->alias]['filename5']['size'];
            $this->data[$this->alias]['filename5'] = $this->data[$this->alias]['filepath5'];
        }*/
        
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
        /*if (!empty($this->data[$this->alias]['filename5']['error']) && $this->data[$this->alias]['filename5']['error']==4 && $this->data[$this->alias]['filename5']['size']==0) {
                unset($this->data[$this->alias]['filename5']);
	}*/

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

