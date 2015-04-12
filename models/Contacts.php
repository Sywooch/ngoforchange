<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "contacts".
 *
 * @property string $id
 * @property string $type
 * @property string $data
 * @property string $create_time
 *
 * @property PersonContact[] $personContacts
 */
class Contacts extends ActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_type', 'contact_data'], 'required'],
            [['create_time'], 'safe'],
            [['contact_type', 'contact_data'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'contact_type' => Yii::t('app', 'Type'),
            'contact_data' => Yii::t('app', 'Data'),
            'create_time' => Yii::t('app', 'Create Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id'])
            ->viaTable('person_contact', ['contacts_id' => 'id']);
    }
}
