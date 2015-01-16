<div class="index">
<?php foreach ($groups as $id => $name):?>
	<?= $this->Html->link($name,["controller"=>"Groups","action"=>"view",$id])?>[<?= $this->Form->postLink("削除",["controller"=>"Groups","action"=>"delete",$id],["confirm"=>"本当に削除しますか?サブグループも全て削除されます。"])?>] </br>
<?php endforeach;?>
</div>
<div class="actions">
	<h3><?= __('Actions') ?></h3>
	<ul>
		<li><?= $this->Html->link(__('New Group'), ['action' => 'add']) ?></li>
	</ul>
</div>
