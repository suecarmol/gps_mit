<?php

/**
 * This is the model class for table "identity".
 *
 * The followings are the available columns in table 'identity':
 * @property integer $id
 * @property string $name
 * @property string $last_name
 * @property string $username
 * @property string $mail
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property Token[] $tokens
 */
class Identity extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'identity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, last_name, username, mail, password, updated_at', 'required'),
			array('mail', 'length', 'max'=>50),
			array('password', 'length', 'max'=>40),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, last_name, username, mail, password, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'identityCompanies' => array(self::HAS_MANY, 'IdentityCompany', 'identity_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'last_name' => 'Last Name',
			'username' => 'Username',
			'mail' => 'Mail',
			'password' => 'Password',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function pendingUpload()
  {
    $uploaded_files = $this->uploaded_files(array('condition'=>'step=1'));
    return $uploaded_files;
    
    /*
    return array(
        'with'=> array("uploaded_files" => array(
          'condition'=> "uploaded_file.step = 1",
        ),
      )
    );
    */
  }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Identity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
