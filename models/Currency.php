<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property string $code
 * @property string $sign_format
 * 
 * @property Trip[] $trips

 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'sign_format'], 'required'],
            [['code'], 'string', 'max' => 3],
            [['sign_format'], 'string', 'max' => 45],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'sign_format' => Yii::t('app', 'Sign Format'),
        ];
    }
        
    public function getTrips()
    {
        return $this->hasMany(Trip::class, ['currency_id' => 'id']);
    }
}
