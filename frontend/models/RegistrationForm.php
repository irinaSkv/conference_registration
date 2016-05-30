<?php
namespace frontend\models;

use yii\web\UploadedFile;
use frontend\models\AbstractRegistrationForm;

/**
 * Форма регистрации
 */
class RegistrationForm extends AbstractRegistrationForm
{
    public $username;
    public $phone;
    public $email;
    public $post;
    public $conference_id;
    
    /**
     * @var UploadedFile
     */
    public $avatarFile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['avatarFile', 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            
            [['username', 'post', 'email'], 'filter', 'filter' => 'trim'],
            [['username', 'phone', 'post', 'email', 'conference_id'], 'required'],
            ['username', 'string', 'min' => 3, 'max' => 255],
            ['username', 'match', 'pattern' => '/^[а-яА-ЯёЁa-zA-Z0-9\s]+$/'],

            ['phone', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой телефон уже зарегистрирован.'],
            ['phone', 'match', 'pattern' => '/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/'],
            
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой email уже зарегистрирован.'],
            ['conference_id', 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Имя участника',
            'phone' => 'Телефон',
            'post' => 'Должность',
            'avatarFile' => 'Аватар',
            'conference_id' => ''
        ];
    }
}
