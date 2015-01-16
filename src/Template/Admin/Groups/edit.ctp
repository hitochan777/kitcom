<div class="groups form">
<?= $this->Form->create($group) ?>
	<fieldset>
		<legend><?= __('Edit Group'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('parent_id', ['options' => $list,"empty"=>"選択してください"]);//this part should not allow change the parent_id to its childrens' id 
		echo $this->Form->input('is_dummy');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
<div class="actions">
	<h3><?= __('Actions') ?></h3>
	<ul>
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $group->id], ['confirm' => __('本当に削除しますか# %s? このグループのサブグループも全て削除されます。', $group->id)]) ?></li>
		<li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?></li>
	</ul>
</div>
