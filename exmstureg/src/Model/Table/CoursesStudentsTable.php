<?php
namespace App\Model\Table;

use Cake\Validation\Validator;
use Cake\ORM\Table;
use Cake\Network\Session;
use DateTime;

class CoursesStudentsTable extends Table
{

    public function initialize(array $config)
    {
    	parent::initialize($config);
    	$this->setPrimaryKey(['student_id', 'course_id']);
    	$this->belongsTo('Students');
    	$this->belongsTo('Courses');
    }
    
    
    public function isOwnedBy($articleId, $userId)
    {
        return $this->exists(['id' => $articleId, 'user_id' => $userId]);
    }
}
