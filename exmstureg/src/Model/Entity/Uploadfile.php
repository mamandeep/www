<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Uploadfile extends Entity
{
	protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}