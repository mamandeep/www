<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Network\Session;
use DateTime;

class MarksgplgTable extends Table
{
    public function initialize(array $config)
    {
    	parent::initialize($config);
    	
    	$this->setTable('marksgplg');
    	$this->setPrimaryKey('id');
    }
}

?>