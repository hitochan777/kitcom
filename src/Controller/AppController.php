<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Error\NotFoundException;

class AppController extends Controller {
	public $components = [
		"Flash",
		"Auth"=>[
			"authenticate"=>[
				"Form"=>[
					"fields"=>[
						"username"=>"username",
						"password"=>"password"
					],
					"scope"=>[
						"activate"=>"1"
					]
				]
			],
			"loginAction"=>[
				"controller"=>"Users",
				"action"=>"login",
				"prefix"=>false
			],
			"logoutAction"=>[
				"controller"=>"Tops",
				"action"=>"index"
			],
			"authError"=>"あなたはこのページを見る権利がありません。",
			"authorize"=>["Controller"],
			"unauthorizedRedirect"=>"/"
		],
		"Paginator",
		"RequestHandler"
	];

	/*public $helpers = [
		'Html' => [
			'className' => 'UsefulHelpers.BootstrapHtml'
		],
		'Form' => [
			'className' => 'UsefulHelpers.BootstrapForm'
		],
		'Paginator' => [
			'className' => 'UsefulHelpers.BootstrapPaginator'
		],
		'Modal' => [
			'className' => 'UsefulHelpers.BootstrapModal'
		]
	];*/

	public function beforeRender(Event $event){
		parent::beforeRender($event);
		/*if($this->request->prefix!= "admin" && $this->request->prefix!="staff"){
			$this->layout = "user";
		}
		else{
			$this->layout = "default";
			$this->helpers["Navbar"] = ["className"=>"UsefulHelpers.SideNavbar"];
		}*/
		$this->helpers["Navbar"] = ["className"=>"UsefulHelpers.SideNavbar"];
	}

	public function beforeFilter(Event $event){
		$userId = $this->Auth->user("id");
		$this->set(compact("userId"));
	}

	public function isAuthorized($user = null) {
		// Any registered user can access public functions
		if ($this->request->prefix != "admin" && $this->request->prefix != "staff") {
			return true;
		}

		if($this->request->prefix == "staff"){	
			return (bool)($user["type"]==="staff" || $user["type"]==="admin");
		}
		// Only admins can access admin functions
		if ($this->request->prefix == "admin") {
			return (bool)($user['type'] === 'admin');
		}

		// Default deny
		return false;
	}
}
