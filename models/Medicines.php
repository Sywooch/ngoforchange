<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Medicines extends ActiveRecord
{
	
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public static function tableName()
    {
        return 'medicines';
    }

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'unit_type'], 'required'],
            [['name', 'unit_type', 'details'], 'string']
        ];
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