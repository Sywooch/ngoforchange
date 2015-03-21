<?php

namespace app\models;

use Yii;

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
class ContactsList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persons';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'data' => Yii::t('app', 'Data'),
            'create_time' => Yii::t('app', 'Create Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonContacts()
    {
        return $this->hasMany(PersonContact::className(), ['contacts_id' => 'id']);
    }
}
