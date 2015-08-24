<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;
use Yii\web\UploadedFile;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $nama;
    public $email;
    public $password;
    public $tanggal_lahir;
	public $fakultas;
	public $jurusan;
    public $angkatan;
    public $pekerjaan;
	public $alamat_rumah;
    public $alamat_domilisi;
	public $no_hp;
	public $id_line;
    public $foto;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This nama has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 100],

            ['nama', 'required'],
            ['nama', 'string', 'min' => 2],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['tanggal_lahir', 'required'],
            ['tanggal_lahir', 'string', 'min'=>10],

            ['fakultas', 'required'],
            ['fakultas', 'string', 'max' => 30],

            ['jurusan', 'required'],
            ['jurusan', 'string', 'max' => 50],
			
			['angkatan', 'required'],
            ['angkatan', 'integer'],

            ['alamat_rumah', 'required'],
            ['alamat_rumah', 'string', 'max' => 256],

            ['alamat_domilisi', 'required'],
            ['alamat_domilisi', 'string', 'max' => 256],

            ['pekerjaan', 'required'],
            ['pekerjaan', 'string', 'max' => 100],

            ['no_hp', 'required'],
            ['no_hp', 'string'],

            ['id_line', 'required'],
            ['id_line', 'string', 'max' => 50],

            [['foto'], 'file', 'extensions'=>'jpg, gif, png', 'checkExtensionByMimeType'=>false,],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->nama = $this->nama;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->tanggal_lahir = $this->tanggal_lahir;
            $user->fakultas = $this->fakultas;
            $user->jurusan = $this->jurusan;
            $user->angkatan = $this->angkatan;
            $user->pekerjaan = $this->pekerjaan;
            $user->alamat_rumah = $this->alamat_rumah;
            $user->alamat_domilisi = $this->alamat_domilisi;
            $user->no_hp = $this->no_hp;
            $user->id_line = $this->id_line;
            $user->foto = 'uploads/'.$this->foto;

            $user->generateAuthKey();
            if ($user->save()) {

                return $user;
            }
        }

        return null;
    }
}
