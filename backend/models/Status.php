<?php

namespace backend\models;

use Yii;
use backend\models\Status;

/**
 * This is the model class for table "status".
 *
 * @property integer $id
 * @property string $status_name
 * @property integer $status_value
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_name', 'status_value'], 'required'],
            [['status_value'], 'integer'],
            [['status_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status_name' => Yii::t('app', 'Status Name'),
            'status_value' => Yii::t('app', 'Status Value'),
        ];
    }

    public function getUsers()
    {
    return $this->hasMany(User::className(), ['status_id' => 'status_value']);
    }
}
