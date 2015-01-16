<div class="groups form">
</div>
<div class="actions">
	<h3><?= __('Actions') ?></h3>
	<ul>
		<li><?= $this->Html->link(__("科目"),["controller"=>"Modules","action"=>"index"])?></li>
		<li><?= $this->Html->link(__("グループ"),["controller"=>"Groups","action"=>"index"])?></li>
		<li><?= $this->Html->link(__("ユーザー"),["controller"=>"Users","action"=>"index"])?></li>
	</ul>
</div>
