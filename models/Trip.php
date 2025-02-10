<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trip".
 *
 * @property int $id
 * @property int $user_id
 * @property int $from
 * @property int $to
 * @property string $date
 * @property int $number_seats
 * @property float $duration
 * @property float $price
 * @property int $currency_id
 * @property int $status
 * @property string $created
 * @property string $updated
 *
 * @property Message[] $messages
 * @property Currency $currency
 * @property Place $fromPlace
 * @property Place $toPlace
 * @property User $user
 */
class Trip extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'from', 'to', 'date', 'number_seats', 'duration', 'price', 'currency_id'], 'required'],
            [['user_id', 'from', 'to', 'number_seats', 'currency_id', 'status'], 'integer'],
            [['date', 'created', 'updated'], 'safe'],
            [['duration', 'price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'from' => Yii::t('app', 'From'),
            'to' => Yii::t('app', 'To'),
            'date' => Yii::t('app', 'Date'),
            'number_seats' => Yii::t('app', 'Number Seats'),
            'duration' => Yii::t('app', 'Duration'),
            'price' => Yii::t('app', 'Price'),
            'currency_id' => Yii::t('app', 'Currency ID'),
            'status' => Yii::t('app', 'Status'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
        ];
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::class, ['trip_id' => 'id']);
    }

    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }

    public function getFromPlace()
    {
        return $this->hasOne(Place::className(), ['id' => 'from']);
    }

    public function getToPlace()
    {
        return $this->hasOne(Place::className(), ['id' => 'to']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
