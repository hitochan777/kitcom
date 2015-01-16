<?php 
$list =  [
	"トップ"=>[
		"url"=>[
			"controller"=>"Tops",
			"action"=>"index"
		]
	],
	"過去問一覧"=>[
		"url"=>[
			"controller"=>"PastExams",
			"action"=>"index"	
		]	
	],
	"科目一覧"=>[
		"url"=>[
			"controller"=>"Modules",
			"action"=>"index"
		]	
	]
];

if($user){//if user is logged in
	$list["マイページ"] = [
		"url"=>[
			"controller"=>"Users",
			"action"=>"myPage"	
		]
	];
	$list["ログアウト"] = [
		"url"=>[
			"controller"=>"Users",
			"action"=>"logout"
		]
	];
}
else{
	$list["ログイン"] = [
		"url"=>[
			"controller"=>"Users",
			"action"=>"login"
		]
	];	
	$list["新規登録"] = [
		"url"=>[
			"controller"=>"Users",
			"action"=>"register"
		]
	];
}

echo $this->Navbar->defaultNavbar($list);
?>
