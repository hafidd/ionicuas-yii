<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "galery".
 *
 * @property string $gl_id
 * @property string $gl_wis_id
 * @property string $gl_nama
 * @property string $gl_gambar
 *
 * @property Wisata $glWis
 */
class Galery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gl_wis_id'], 'integer'],
            [['gl_nama', 'gl_gambar'], 'string', 'max' => 100],
            [['gl_wis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wisata::className(), 'targetAttribute' => ['gl_wis_id' => 'wis_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gl_id' => 'Gl ID',
            'gl_wis_id' => 'Gl Wis ID',
            'gl_nama' => 'Gl Nama',
            'gl_gambar' => 'Gl Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGlWis()
    {
        return $this->hasOne(Wisata::className(), ['wis_id' => 'gl_wis_id']);
    }
}
