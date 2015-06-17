<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "person".
 *
 * @property string $id
 * @property string $last_name
 * @property string $father_name
 * @property string $first_name
 * @property string $ssrn
 * @property string $id_number
 * @property string $address
 * @property string $post_code
 * @property string $city
 * @property integer $is_deleted
 * @property string $deletion_reason
 * @property string $creation_time
 *
 * @property CashReceipt[] $cashReceipts
 * @property ElectionsVotes[] $electionsVotes
 * @property EventPerson[] $eventPeople
 * @property MedicinesMovement[] $medicinesMovements
 * @property PayReceipt[] $payReceipts
 * @property PersonContact[] $personContacts
 * @property PersonDataOfficial $personDataOfficial
 * @property PersonDataPatient $personDataPatient
 * @property PersonDataRelative $personDataRelative
 * @property PersonDataVolunteer $personDataVolunteer
 * @property PersonDateFriend $personDateFriend
 * @property PersonTypeAsign[] $personTypeAsigns
 */
class Person extends ActiveRecord
{
    public $selectedTypes = [];
	
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name'], 'required', 'message' => Yii::t('app', 'This field can\'t be blank.')],
            [['is_deleted'], 'integer'],
            [['address'], 'string'],
            [['creation_time'], 'safe'],
            [['last_name', 'father_name', 'first_name', 'ssrn', 'id_number', 'post_code', 'city', 'deletion_reason'], 'string', 'max' => 255],
            [['selectedTypes'], 'validateSelectedTypes'],
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        $currentTypes = $this->types;
        $selectedTypes = $this->selectedTypes;

        // checking for extra elements (to DELETE)
        foreach ($currentTypes as $key => $type) {
            $index = array_search($type['id'], $selectedTypes);
            if($index === NULL || $index === FALSE) {
                // delete this item
                PersonTypeAssign::find()
                    ->where([
                        'person_id' => $this->id,
                        'person_type_id' => $type['id']
                    ])
                    ->delete();
            } else {
                // do nothing
            }
        }

        // checking for new elements (to ADD)
        if($selectedTypes) {
            foreach ($selectedTypes as $key => $type_id) {
                foreach ($currentTypes as $key => $type) {
                    if($type['id'] == $type_id) {
                        continue 2;
                    }
                }
                // add this item
                $assign = new PersonTypeAssign();
                $assign->person_id = $this->id;
                $assign->person_type_id = $type_id;
                $assign->save();
            }
        }

        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'last_name' => Yii::t('app', 'Last Name'),
            'father_name' => Yii::t('app', 'Father Name'),
            'first_name' => Yii::t('app', 'First Name'),
            'ssrn' => Yii::t('app', 'SSRN'),
            'id_number' => Yii::t('app', 'ID Number'),
            'address' => Yii::t('app', 'Address'),
            'post_code' => Yii::t('app', 'Post Code'),
            'city' => Yii::t('app', 'City'),
            'types' => Yii::t('app', 'Register as'),
            'selectedTypes' => Yii::t('app', 'Selected Types')
        ];
    }

    public function getTypes()
    {
        return $this->hasMany(PersonType::className(), ['id' => 'person_type_id'])
            ->viaTable('person_type_asign', ['person_id' => 'id']);
    }

    public function getContacts()
    {
        return $this->hasMany(Contacts::className(), ['id' => 'contacts_id'])
            ->viaTable('person_contact', ['person_id' => 'id']);
    }

    public function validateSelectedTypes($attribute, $params)
    {
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCashReceipts()
    {
        return $this->hasMany(CashReceipt::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectionsVotes()
    {
        return $this->hasMany(ElectionsVotes::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventPeople()
    {
        return $this->hasMany(EventPerson::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicinesMovements()
    {
        return $this->hasMany(MedicinesMovement::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayReceipts()
    {
        return $this->hasMany(PayReceipt::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonContacts()
    {
        return $this->hasMany(PersonContact::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(PersonDataPatient::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfficial()
    {
        return $this->hasOne(PersonDataOfficial::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriend()
    {
        return $this->hasOne(PersonDataFriend::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVolunteer()
    {
        return $this->hasOne(PersonDataVolunteer::className(), ['person_id' => 'id']);
    }
}

?>