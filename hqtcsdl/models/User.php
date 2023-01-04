<?php
namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string|null $authkey
 * @property string|null $accesstoken
 * @property string $type
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    
    /**
     *
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mbo_user';
    }
    
    /**
     *
     * {@inheritdoc}
     */
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'type'], 'required'],
            [['username', 'password', 'type'], 'string'],
            [['authkey', 'accesstoken'], 'string', 'max' => 255],
        ];
    }
    
    /**
     *
     * {@inheritdoc}
     */
    public function generateAuthkey(){
      //  $this->authkey=yii::$app->security->generateRandomString();
    }
    
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'authkey' => 'Authkey',
            'accesstoken' => 'Accesstoken'
        ];
    }
    
    public function getId()
    {
    //    return $this->id;
    }
    
    public function validateAuthKey($authKey)
    {
        //return $this->getAuthKey() === $authKey;
    }
    
    public function getAuthKey()
    {
        //return $this->authkey;
    }
    
    public static function findIdentity($id)
    {
       // return static::findOne($id);
    }
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne([
            'accesstoken' => $token
        ]);
    }
    
    public static function findByUsername($username)
    {
        return static::find()->where([
            'username' => $username
        ])
        ->limit(1)
        ->one();
    }
    
    public function validatePassword($password)
    {
        return $this->password;
        // return Yii::$app->security->validatePassword($password, $this->password);
    }
    public function setPassWord($passWord){
        return $this->password= Yii::$app->getSecurity()->generatePasswordHash($passWord);
    }
    
}
