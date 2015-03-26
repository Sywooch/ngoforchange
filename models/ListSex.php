<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "list_sex".
 *
 * @property string $key
 * @property string $name
 */
class ListSex extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'list_sex';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'name'], 'required'],
            [['key', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'key' => Yii::t('app', 'Key'),
            'name' => Yii::t('app', 'Name'),
        ];
    }
}
