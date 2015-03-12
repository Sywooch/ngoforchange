<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class PersonType extends ActiveRecord
{
	
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public static function tableName()
    {
        return 'person_type';
    }

    public function serialize()
    {
        return serialize($this->attributes);
    }
    
    public function unserialize($serialized)
    {
        $this->setAttributes(unserialize($serialized), false);
    }
}

?>