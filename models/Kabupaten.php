<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property int $kab_id
 * @property string $kab_nama
 *
 * @property Wisata[] $wisatas
 */
class Kabupaten extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kab_nama'], 'required'],
            [['kab_nama'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kab_id' => 'Kab ID',
            'kab_nama' => 'Kab Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWisatas()
    {
        return $this->hasMany(Wisata::className(), ['wis_kab_id' => 'kab_id']);
    }
}
