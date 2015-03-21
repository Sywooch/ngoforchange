<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vw_person_summary".
 *
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property string $count_contacts
 * @property string $count_assigns
 */
class PersonSummary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vw_person_summary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'count_contacts', 'count_assigns'], 'integer'],
            [['first_name', 'last_name'], 'required'],
            [['first_name', 'last_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'count_contacts' => Yii::t('app', 'Count Contacts'),
            'count_assigns' => Yii::t('app', 'Count Assigns'),
        ];
    }
}
