<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $nama
 * @property string $judul
 * @property string $isi_post
 * @property string $waktu
 * @property integer $kategory_forum
 *
 * @property Forum $kategoryForum
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'judul', 'isi_post', 'kategory_forum'], 'required'],
            [['isi_post'], 'string'],
            [['waktu'], 'safe'],
            [['kategory_forum'], 'integer'],
            [['nama'], 'string', 'max' => 50],
            [['judul'], 'string', 'max' => 150],
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
            'judul' => 'Judul',
            'isi_post' => 'Isi Post',
            'waktu' => 'Waktu',
            'kategory_forum' => 'Kategory Forum',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategoryForum()
    {
        return $this->hasOne(Forum::className(), ['id' => 'kategory_forum']);
    }
}
