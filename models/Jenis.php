<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis".
 *
 * @property int $jenis_id
 * @property string $jenis_nama
 *
 * @property Wisata[] $wisatas
 */
class Jenis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_nama'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jenis_id' => 'Jenis ID',
            'jenis_nama' => 'Jenis Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWisatas()
    {
        return $this->hasMany(Wisata::className(), ['wis_jenis_id' => 'jenis_id']);
    }
}
