<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_contact".
 *
 * @property string $id
 * @property string $person_id
 * @property string $contacts_id
 *
 * @property Contacts $contacts
 * @property Person $person
 */
class PersonContact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'contacts_id'], 'required'],
            [['person_id', 'contacts_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'person_id' => Yii::t('app', 'Person ID'),
            'contacts_id' => Yii::t('app', 'Contacts ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasOne(Contacts::className(), ['id' => 'contacts_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }
}
