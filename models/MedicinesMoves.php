<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class MedicinesMoves extends ActiveRecord
{
	
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public static function tableName()
    {
        return 'medicines_movement';
    }

    public function getPerson()
    {
        // Movement has_one Person via Person.id -> person_id
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    public function getMedicines()
    {
        // Movement has_one Medicine via Medicine.id -> medicine_id
        return $this->hasOne(Medicines::className(), ['id' => 'medicines_id']);
    }
}

?>