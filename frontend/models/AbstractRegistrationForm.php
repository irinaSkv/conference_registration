<?php
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Форма регистрации
 */
abstract class AbstractRegistrationForm extends Model
{
    public $username;
    public $post;
    
    /**
     * @var UploadedFile
     */
    public $avatarFile;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Имя участника',
            'post' => 'Должность',
            'avatarFile' => 'Аватар'
        ];
    }
    
    /**
     * Сохранить фйл в uploads/
     */
    public function upload()
    {
        return $this->avatarFile->saveAs(
            'uploads/' 
            . $this->avatarFile->baseName 
            . '.' 
            . $this->avatarFile->extension
        );
    }
}
