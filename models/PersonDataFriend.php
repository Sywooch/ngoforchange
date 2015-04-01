<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_date_friend".
 *
 * @property string $person_id
 * @property string $ssrn
 * @property string $address
 * @property string $post_code
 * @property string $city
 * @property string $registered_since
 * @property string $comments
 * @property string $create_time
 * @property string $update_time
 *
 * @property Person $person
 */
class PersonDataFriend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_date_friend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'registered_since'], 'required'],
            [['person_id'], 'integer'],
            [['comments'], 'string'],
            [['tax_registration_number'], 'string', 'max' => 255],
            [['registered_since', 'create_time', 'update_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => Yii::t('app', 'Person ID'),
            'tax_registration_number' => Yii::t('app', 'Tax Registation Number'),
            'registered_since' => Yii::t('app', 'Registered Since'),
            'comments' => Yii::t('app', 'Comments'),
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
