<?= $this->Form->create($pastExam) ?>
	<fieldset>
		<legend><?= __('過去問投稿') ?></legend>
	<?php
		echo $this->Form->input('module_id', ['options' => $modules,"value"=>$moduleId]);
		echo $this->Form->input('content');
	?>
		<p id="preview"></p>
	</fieldset>
<?= $this->Form->button(__('投稿する')) ?>
<?= $this->Form->end() ?>

<script>
		$(function(){
			$("#content").change(function(){
				$("#preview").text($("#content").text());			
			});
		});
</script>
