<?php
namespace UsefulHelpers\View\Helper;

use Cake\View\Helper;

class SideNavbarHelper extends Helper {    
	public $helpers = ["Html"];

	public function defaultNavbar($list = []){
		$ret = "";
		if(empty($list)){
			throw new \Exception("list is empty in defaultNavbar in SideNavbarHelper");
		}
		$nestedList = $this->Html->nestedList($this->formatedList2StringList($list),["class"=>"side-nav"]);
		$ret = <<<STR
		<div class="actions columns large-2 medium-3">
			$nestedList
		</div>
STR;
		return $ret;
	}

	public function formatedList2StringList($list){
		$ret = [];
		foreach($list as $key => $item){
			if(is_array($item) && array_key_exists("url",$item)){
				array_push($ret,$this->Html->link($key,$item["url"]));
			}
			else{
				array_push($ret,$key);
			}
		}	
		return $ret;
	}
}

?>


