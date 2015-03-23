<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_data_patient".
 *
 * @property string $person_id
 * @property string $photo
 * @property string $mother_name
 * @property string $sex
 * @property string $marital_status
 * @property integer $children
 * @property string $graduation
 * @property string $occupation
 * @property string $disability
 * @property string $disability_proof
 * @property string $application_form
 * @property string $medication
 * @property integer $private_correspondence
 * @property string $last_contact
 * @property string $comments
 * @property string $create_time
 * @property string $update_time
 *
 * @property Person $person
 */
class PersonDataPatient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_data_patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'mother_name', 'disability'], 'required'],
            [['person_id', 'children', 'private_correspondence'], 'integer'],
            [['photo', 'disability', 'disability_proof', 'application_form', 'medication', 'comments'], 'string'],
            [['last_contact', 'create_time', 'update_time'], 'safe'],
            [['mother_name', 'sex', 'marital_status', 'graduation', 'occupation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => Yii::t('app', 'Person ID'),
            'photo' => Yii::t('app', 'Photo'),
            'mother_name' => Yii::t('app', 'Mother Name'),
            'sex' => Yii::t('app', 'Sex'),
            'marital_status' => Yii::t('app', 'Marital Status'),
            'children' => Yii::t('app', 'Children'),
            'graduation' => Yii::t('app', 'Graduation'),
            'occupation' => Yii::t('app', 'Occupation'),
            'disability' => Yii::t('app', 'Disability'),
            'disability_proof' => Yii::t('app', 'Disability Proof'),
            'application_form' => Yii::t('app', 'Application Form'),
            'medication' => Yii::t('app', 'Medication'),
            'private_correspondence' => Yii::t('app', 'Private Correspondence'),
            'last_contact' => Yii::t('app', 'Last Contact'),
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
