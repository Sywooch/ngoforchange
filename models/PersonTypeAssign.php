<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_type_asign".
 *
 * @property string $id
 * @property string $person_id
 * @property string $person_type_id
 *
 * @property Person $person
 * @property PersonType $personType
 */
class PersonTypeAssign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_type_asign';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'person_type_id'], 'required'],
            [['person_id', 'person_type_id'], 'integer']
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
            'person_type_id' => Yii::t('app', 'Person Type ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonType()
    {
        return $this->hasOne(PersonType::className(), ['id' => 'person_type_id']);
    }
}
