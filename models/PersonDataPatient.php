<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

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
    public $photo_file;
    public $disability_proof_file;
    public $application_form_file;
    
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
            [['person_id', 'mother_name', 'disability', 'registered_since'], 'required'],
            [['person_id', 'children', 'disability', 'private_correspondence', 'email_subscribe', 'disability_subsidy'], 'integer'],
            [['last_contact', 'create_time', 'update_time'], 'safe'],
            [['photo', 'disability_proof', 'application_form', 'mother_name', 'sex', 'marital_status', 'profession', 'graduation', 'occupation', 'doctor', 'health_insurance'], 'string', 'max' => 255],
            [['comments'], 'string'],
            [['registered_since', 'birthday'], 'string'],
            [['photo_file', 'disability_proof_file', 'application_form_file'], 'file'],
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
            'birthday' => Yii::t('app', 'Birthday'),
            'marital_status' => Yii::t('app', 'Marital Status'),
            'children' => Yii::t('app', 'Children'),
            'profession' => Yii::t('app', 'Profession'),
            'graduation' => Yii::t('app', 'Graduation'),
            'occupation' => Yii::t('app', 'Occupation'),
            'disability' => Yii::t('app', 'Disability').' (%)',
            'disability_subsidy' => Yii::t('app', 'Disability Subsidy').' (€)',
            'disability_proof' => Yii::t('app', 'Disability Proof'),
            'disability_proof_file' => Yii::t('app', 'Disability Proof'),
            'application_form' => Yii::t('app', 'Application Form'),
            'application_form_file' => Yii::t('app', 'Application Form'),
            'doctor' => Yii::t('app', 'Doctor'),
            'health_insurance' => Yii::t('app', 'Health Insurance'),
            'private_correspondence' => Yii::t('app', 'Private Correspondence'),
            'email_subscribe' => Yii::t('app', 'Email Subscription'),
            'registered_since' => Yii::t('app', 'Registered Since'),
            'last_contact' => Yii::t('app', 'Last Contact'),
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

    public function save($runValidation = true, $attributeNames = null)
    {
        $pstx = '_file';
        $files = [ 'photo', 'application_form', 'disability_proof' ];
        $path = '../uploads/';

        foreach ($files as $idx => $name) {
            $this[$name.$pstx] = UploadedFile::getInstance($this, $name.$pstx);
            if($this[$name.$pstx]) {
                $file = $this[$name.$pstx];
                $fileName = 
                    $this->person_id.'_'.date('Y_m_d_H_i_s').'.'.
                    $file->extension;
                $file->saveAs(
                    $path.
                    $name.'/'.
                    $fileName);
                $this[$name] = $fileName;
            }
        }
        return parent::save($runValidation, $attributeNames);
    }
}
