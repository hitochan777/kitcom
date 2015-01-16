<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Error\NotFoundException;
use Cake\Network\Email\Email;
use Cake\Routing\Router;
use Cake\Network\Error\SocketException;
use Cake\Log\Log;

define ( "DEADLINE_TIME_INTERVAL", 60 * 60 * 3 );

class UsersController extends AppController {
	public function login() {
		$user = $this->Users->newEntity ( $this->request->data );
		if ($this->request->is ( 'post' )) {
			$user = $this->Auth->identify ();
			if ($user) {
				$this->Auth->setUser ( $user );
				return $this->redirect ( $this->Auth->redirectUrl () );
			} else {

				$this->Flash->error (__("パスワードもしくはユーザー名が間違っています"));
			}
		}
		$this->set ( compact ( "user" ) );
	}
	public function register() {
		$user = $this->Users->newEntity ( $this->request->data );
		if ($this->request->is ( 'post' )) {
			$request = $this->request->data;
			$timestamp = time (); //
			$tokenhash = sha1 ( $request['username'] . rand ( 0, 100 ) . $timestamp ) . "&" . $timestamp;
			$request["tokenhash"] = $tokenhash;
			$user = $this->Users->newEntity ( $request,["validate"=>"register"]);
			if ($result = $this->Users->save($user)) {
				$id = $result->id;
				$request = array_merge ( $request, [
					'id' => $id
				] );
				$encoded_tokenhash = urlencode ( $tokenhash );
				$message = Router::url ( [
					"controller" => "Users",
					"action" => "verify",
					"?" => [ 
						"tokenhash" => $encoded_tokenhash,
						"username" => $request["username"] 
					],
					"_full" => true 
				] );
				$email = new Email ( "default" );
				$email->from ( [
					'kit-web@no-reply.com' => 'KIT-web' 
				] )->to ( $request ["email"] )->subject ( 'KIT-web 仮登録完了のお知らせ' );
				try {
					$email->send ( $message );
				} catch ( SocketException $e ) {
					$this->Flash->error (__("仮登録完了メール送信に失敗しました。") );
					return $this->redirect ( [ 
						"action" => "register" 
					] );
				}
				$this->set ( "message", "仮登録が完了しました。本登録用のリンクを{$request["email"]}に送信しました。" );
				$this->render ( "temp_register_complete" );
			} else {
				$this->Flash->error (__("仮登録に失敗しました。もう一度お試しください。"));
			}
		}

		$this->set ( compact ( "user" ) );
	}
	public function verify() {
		if (! $this->request->is ( "get" )) {
			return $this->redirect ( [ 
				"action" => "register" 
			] );
		}
		$tokenhash = $this->request->query ( "tokenhash" );
		$username = $this->request->query ( "username" );
		$user = $this->Users->findByUsername ( $username )->first ();
		if ($user) {
			if ($user->activate == 0) {
				if ($user->tokenhash == $tokenhash && $this->_isValidTime ( intval ( substr ( $tokenhash, strrpos ( $tokenhash, "&" ) + 1 ) ) )) {
					// Set activate to 1
					$user->activate = 1;
					$this->Users->save ( $user );
					$this->Flash->success (__('登録が完了しました。'));
					// $this->Auth->login($user['User']);
					return $this->redirect ( "/" );
				} else {
					$this->Flash->error (__("トークンが無効、もしくは、登録期限が過ぎています。") );
					return $this->redirect ( [ 
						"action" => "register" 
					] );
				}
			} else {
				$this->Flash->error (__("エラーが発生しました。") );
				return $this->redirect ( [ 
					"action" => "register" 
				] );
			}
		} else {
			$this->Flash->error (__("ユーザー名が不正です。"));
			return $this->redirect ( [ 
				"action" => "register" 
			] );
		}
	}
	private function _isValidTime($timestamp = null) {
		if ($timestamp == null) {
			return false;
		}
		if (time () - $timestamp <= DEADLINE_TIME_INTERVAL) {
			return true;
		}
		return false;
	}
	public function beforeFilter(Event $event) {
		parent::beforeFilter ( $event );
		$this->Auth->allow ( [ 
			"logout",
			"register",
			"verify" 
		] );
	}
	public function logout() {
		return $this->redirect ( $this->Auth->logout () );
	}
	public function myPage() {
		$user = $this->Users->get ($this->Auth->user ( "id" ) );
		$this->set ( compact ( "user" ) );
	}

	public function edit(){
		$user = $this->Users->get($this->Auth->user("id"));
		if($this->request->is(["post","put"])){
			$this->Users->patchEntity($user,$this->request->data);
			$valid = $this->Users->validate($user,["validate"=>"edit"]);
			if($this->request->data("current_password")){//setting new password?
				$user->password = $this->request->data("new_password");
			}
			if($valid && $this->Users->save($user)){
				$this->Flash->success(__("ユーザー情報が変更されました。"));
				return $this->redirect(["controller"=>"Users","action"=>"myPage"]);
			}
			else{
				$this->Flash->error(__("ユーザー情報の変更中にエラーが発生しました。"));
			}
		}
		$this->set(compact("user"));
	}
}
