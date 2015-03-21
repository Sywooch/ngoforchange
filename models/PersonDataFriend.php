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
            [['person_id', 'ssrn', 'city', 'registered_since'], 'required'],
            [['person_id'], 'integer'],
            [['address', 'comments'], 'string'],
            [['registered_since', 'create_time', 'update_time'], 'safe'],
            [['ssrn', 'post_code', 'city'], 'string', 'max' => 255]
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
            'registered_since' => Yii::t('app', 'Registered Since'),
            'comments' => Yii::t('app', 'Comments'),
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
