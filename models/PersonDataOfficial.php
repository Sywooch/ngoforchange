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
            [['person_id', 'institution', 'capacity', 'city'], 'required'],
            [['person_id'], 'integer'],
            [['address'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['institution', 'capacity', 'post_code', 'city'], 'string', 'max' => 255]
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
            'address' => Yii::t('app', 'Address'),
            'post_code' => Yii::t('app', 'Post Code'),
            'city' => Yii::t('app', 'City'),
            'create_time' => Yii::t('app', 'Create Time'),
            'update_time' => Yii::t('app', 'Update Time'),
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
