<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;

class UsersTable extends Table{

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('users');
		$this->displayField('username');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');
	}


	public function validationRegister(Validator $validator){
		$validator->add(
			"password",[
				"notEmpty"=>[
					"rule"=>"notEmpty"
				],
				"identical" => [
					"rule"=>[$this,"identicalPassword"],
					"message"=>"パスワードが一致しません。"
				]
			]
		);

		return $validator;	
	}

	public function validationEdit(Validator $validator){
		$validator->notEmpty("current_password","入力してください",[$this,"isPasswordChange"])
			->notEmpty("new_password","入力してください",[$this,"isPasswordChange"])
			->notEmpty("new_password_confirm","入力してください",[$this,"isPasswordChange"])
			->add(
				"current_password",[
					"isCorrect"=>[
						"rule"=>[$this,"isCorrect"],
						"message"=>"パスワードが間違っています。",
						"on"=>[$this,"isPasswordChange"]
					]		
				]
			)
			->add(
				"new_password",[
					"identical"=>[
						"rule"=>[$this, "identicalPassword"],
						"message"=>"パスワードが一致しません。",
						"on"=>[$this,"isPasswordChange"]
					]	
				]
			);	
		return $validator;
	}

	public function isPasswordChange($context){
		$result = !empty($context["data"]["current_password"]) ||
			!empty($context["data"]["new_password"]) ||
			!empty($context["data"]["new_password_confirm"]);
		return $result;
	}

	public function isCorrect($value,$context){
		$user = $this->get($context["data"]["id"]);
		if(empty($user)){
			return false;	
		}
		$dph = new DefaultPasswordHasher;
		if($dph->check($context["data"]["current_password"],$user->password)){
			return true;
		}
		return false;
	}

	public function validationDefault(Validator $validator){
		$validator->add(
			"username",[
				"notEmpty"=>[
					"rule"=>"notEmpty"
				],
				"unique"=>[
					"rule"=>"validateUnique",
					"provider"=>"table",
					"message"=>"このユーザー名はすでに登録されています。"
				]
			]
		)
		->add(
			"email",[
				"email" => [
					"rule" => "email",
					"message" => 'メールアドレスを入力してください',
				],
				"unique" =>[
					"rule"=> "validateUnique",
					"provider"=>"table",
					"message"=>"このメールアドレスはすでに登録されています。"
				] 

			]
		);

		return $validator;
	}


	public function identicalPassword($value, $context){
		$dph = new DefaultPasswordHasher;
		if(array_key_exists("password_confirm",$context["data"])){
			if($dph->check($context["data"]["password_confirm"],$value)){
				return true;
			}
		}
		else if(array_key_exists("new_password_confirm",$context["data"])){
			if($context["data"]["new_password_confirm"]==$value){
				return true;
			}	
		}
		return false;
	}
}
?>
