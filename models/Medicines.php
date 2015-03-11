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
/*
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'AuthorsID' => Yii::t('app', 'Authors ID'),
            'LastEdited' => Yii::t('app', 'Last Edited'),
            'Published' => Yii::t('app', 'Published'),
            'Title' => Yii::t('app', 'Title'),
            'Description' => Yii::t('app', 'Description'),
            'Content' => Yii::t('app', 'Content'),
            'Format' => Yii::t('app', 'Format'),
        ];
    }
*/
    public function serialize()
    {
        return serialize($this->attributes);
    }

    /**
    * @inheritdoc
    */
    public function unserialize($serialized)
    {
        $this->setAttributes(unserialize($serialized), false);
    }
}

?>