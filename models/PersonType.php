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
}

?>