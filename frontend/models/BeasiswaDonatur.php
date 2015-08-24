<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "beasiswa_donatur".
 *
 * @property integer $id
 * @property string $nama
 * @property string $nominal
 * @property string $status
 */
class BeasiswaDonatur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beasiswa_donatur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'nominal'], 'required'],
            [['nama'], 'string', 'max' => 100],
            [['nominal'], 'string', 'max' => 10],
            [['status'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'nominal' => 'Nominal',
            'status' => 'Status',
        ];
    }
}
