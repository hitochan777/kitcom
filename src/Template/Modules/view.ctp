<div class="columns large-10 small-9">
<h2><?= h($module->name) ?></h2>

<table class="table table-striped">
	<tr>
		<td>学年</td>
		<td><?= h($module->grade) ?></td>
	</tr>
	<tr>
		<td>クラス</td>
		<td><?= h($module->class) ?></td>
	</tr>
	<tr>
		<td>授業形式</td>
		<td><?= $module->has('class_type') && !(empty($module->class_type->name)) ? $module->class_type->name : "不明" ?>
		</td>
	</tr>
	<tr>
		<td>単位数</td>
		<td><?= h($module->credit) ?>
		</td>
	</tr>
</table>

<?= $this->Html->link("過去問を投稿する",["controller"=>"PastExams","action"=>"add",$module->id],["class"=>"btn btn-primary"])?>
</div>
