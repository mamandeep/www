<?php

namespace App\Model\Table;

use Cake\Validation\Validator;
use Cake\ORM\Table;
use Cake\Network\Session;
use DateTime;

class ReportsTable extends Table
{
	
	public function initialize(array $config)
	{
		parent::initialize($config);
		
		$this->setTable(null);
		//$this->setPrimaryKey('id');
		
		
		/*$this->hasOne('Seats');
		$this->belongsTo('Categories');
		$this->hasMany('Preferences');
		$this->belongsTo('States');*/
		
		$this->addBehavior('Timestamp');
	}
	
	public function isOwnedBy($articleId, $userId)
	{
		return $this->exists(['id' => $articleId, 'user_id' => $userId]);
	}
}
?>