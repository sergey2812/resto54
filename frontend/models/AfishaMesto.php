<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Categories is the model для разделов меню.
 */
class AfishaMesto extends ActiveRecord
{
    public static function tableName()
    {
        return 'events_mesto';
    }     
}
