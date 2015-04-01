<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_data_official".
 *
 * @property string $person_id
 * @property string $institution
 * @property string $capacity
 * @property string $address
 * @property string $post_code
 * @property string $city
 * @property string $create_time
 * @property string $update_time
 *
 * @property Person $person
 */
class PersonDataOfficial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_data_official';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'institution', 'capacity'], 'required'],
            [['person_id'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['institution', 'capacity'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => Yii::t('app', 'Person ID'),
            'institution' => Yii::t('app', 'Institution'),
            'capacity' => Yii::t('app', 'Capacity'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }
}
