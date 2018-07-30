<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wisata".
 *
 * @property int $wis_id
 * @property int $wis_kab_id
 * @property int $wis_jenis_id
 * @property string $wis_nama
 * @property string $wis_keterangan
 * @property double $wis_lat
 * @property double $wis_long
 *
 * @property Jenis $wisJenis
 * @property Kabupaten $wisKab
 */
class Wisata extends \yii\db\ActiveRecord
{
    public $photos;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wisata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wis_kab_id', 'wis_jenis_id'], 'integer'],
            [['wis_keterangan'], 'string'],
            [['wis_lat', 'wis_long', 'photos'], 'number'],
            [['wis_nama'], 'string', 'max' => 100],
            [['wis_jenis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jenis::className(), 'targetAttribute' => ['wis_jenis_id' => 'jenis_id']],
            [['wis_kab_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kabupaten::className(), 'targetAttribute' => ['wis_kab_id' => 'kab_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'wis_id' => 'Wis ID',
            'wis_kab_id' => 'Wis Kab ID',
            'wis_jenis_id' => 'Wis Jenis ID',
            'wis_nama' => 'Wis Nama',
            'wis_keterangan' => 'Wis Keterangan',
            'wis_lat' => 'Wis Lat',
            'wis_long' => 'Wis Long',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWisJenis()
    {
        return $this->hasOne(Jenis::className(), ['jenis_id' => 'wis_jenis_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWisKab()
    {
        return $this->hasOne(Kabupaten::className(), ['kab_id' => 'wis_kab_id']);
    }   

    public function getGalery()
    {
        return $this->hasMany(Galery::className(), ['gl_wis_id' => 'wis_id']);
    } 
}
