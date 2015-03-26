<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "list_marital_status".
 *
 * @property string $key
 * @property string $name
 */
class ListMaritalStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'list_marital_status';
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
