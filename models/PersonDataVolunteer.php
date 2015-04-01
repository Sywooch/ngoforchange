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
            [['person_id', 'birthday', 'may_provide', 'registered_since'], 'required'],
            [['person_id'], 'integer'],
            [['may_provide'], 'string'],
            [['birthday', 'registered_since', 'create_time', 'update_time'], 'safe'],
            [['marital_status', 'graduation', 'graduation', 'occupation', 'resume'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => Yii::t('app', 'Person ID'),
            'birthday' => Yii::t('app', 'Birthday'),
            'marital_status' => Yii::t('app', 'Marital Status'),
            'graduation' => Yii::t('app', 'Profession'),
            'graduation' => Yii::t('app', 'Graduation'),
            'occupation' => Yii::t('app', 'Occupation'),
            'resume' => Yii::t('app', 'Resume'),
            'may_provide' => Yii::t('app', 'May Provide'),
            'registered_since' => Yii::t('app', 'Registered Since'),
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
