<?= $this->Form->create($post,["url"=>["controller"=>"Posts","action"=>"add"]])?>
<?= $this->Form->input("to_referer",["type"=>"hidden","value"=>1])?>
<?php
if(empty($options["moduleId"])){
	echo $this->Form->input("module_id",["options"=>$modules,"class"=>"form-control"]);
}
else{
	echo $this->Form->input("module_id",["value"=>$options["moduleId"],"type"=>"hidden"]);
}
?>
<?= $this->Form->input("title",["class"=>"form-control","label"=>"タイトル"])?>
<?= $this->Form->input("content",["class"=>"form-control","type"=>"textarea","rows"=>"10","label"=>"内容"])?>
<?= $this->Form->button(__("投稿"),["class"=>"btn btn-success"])?>
<?= $this->Form->end() ?>
