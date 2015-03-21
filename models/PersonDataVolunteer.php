<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_data_volunteer".
 *
 * @property string $person_id
 * @property string $ssrn
 * @property string $address
 * @property string $post_code
 * @property string $city
 * @property string $birthday
 * @property string $marital_status
 * @property string $graduation
 * @property string $occupation
 * @property string $resume
 * @property string $may_provide
 * @property string $registered_since
 * @property string $create_time
 * @property string $update_time
 *
 * @property Person $person
 */
class PersonDataVolunteer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_data_volunteer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'ssrn', 'city', 'birthday', 'may_provide', 'registered_since'], 'required'],
            [['person_id'], 'integer'],
            [['address', 'resume', 'may_provide'], 'string'],
            [['birthday', 'registered_since', 'create_time', 'update_time'], 'safe'],
            [['ssrn', 'post_code', 'city', 'marital_status', 'graduation', 'occupation'], 'string', 'max' => 255],
            [['ssrn'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => Yii::t('app', 'Person ID'),
            'ssrn' => Yii::t('app', 'Ssrn'),
            'address' => Yii::t('app', 'Address'),
            'post_code' => Yii::t('app', 'Post Code'),
            'city' => Yii::t('app', 'City'),
            'birthday' => Yii::t('app', 'Birthday'),
            'marital_status' => Yii::t('app', 'Marital Status'),
            'graduation' => Yii::t('app', 'Graduation'),
            'occupation' => Yii::t('app', 'Occupation'),
            'resume' => Yii::t('app', 'Resume'),
            'may_provide' => Yii::t('app', 'May Provide'),
            'registered_since' => Yii::t('app', 'Registered Since'),
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
