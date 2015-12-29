<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "districts".
 *
 * @property integer $DISTRICT_ID
 * @property string $DISTRICT_CODE
 * @property string $DISTRICT_NAME
 * @property string $DISTRICT_NAME_ENG
 * @property integer $AMPHUR_ID
 * @property integer $PROVINCE_ID
 */
class Districts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'districts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISTRICT_CODE', 'DISTRICT_NAME', 'DISTRICT_NAME_ENG'], 'required'],
            [['AMPHUR_ID', 'PROVINCE_ID'], 'integer'],
            [['DISTRICT_CODE'], 'string', 'max' => 6],
            [['DISTRICT_NAME', 'DISTRICT_NAME_ENG'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DISTRICT_ID' => 'District  ID',
            'DISTRICT_CODE' => 'District  Code',
            'DISTRICT_NAME' => 'District  Name',
            'DISTRICT_NAME_ENG' => 'District  Name  Eng',
            'AMPHUR_ID' => 'Amphur  ID',
            'PROVINCE_ID' => 'Province  ID',
        ];
    }
    
    public function getAmpd(){//relation ตำบลไปอำเภอ
        return $this->hasOne(Amphures::className(), ['AMPHUR_ID'=>'AMPHUR_ID']);
    }
    public function getProd(){//relation ตำบลไปจังหวัด
        return $this->hasOne(Provinces::className(), ['PROVINCE_ID'=>'PROVINCE_ID']);
    }
}
