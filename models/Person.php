<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Person extends ActiveRecord
{
	
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public static function tableName()
    {
        return 'person';
    }

    public function getTypes()
    {
        return $this->hasMany(PersonType::className(), ['id' => 'person_type_id'])
            ->viaTable('person_type_asign', ['person_id' => 'id']);
    }
}

?>