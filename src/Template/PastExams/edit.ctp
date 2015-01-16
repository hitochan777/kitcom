<div class="pastExams form large-10 medium-9 columns">
<?= $this->Form->create($pastExam) ?>
	<fieldset>
		<legend><?= __('Edit Past Exam') ?></legend>
	<?php
		echo $this->Form->input('module_id', ['options' => $modules]);
		echo $this->Form->input('user_id', ['options' => $users]);
		echo $this->Form->input('content');
	?>
		
		<label for="preview">プレビュー</label>
		<div id="preview"></div>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>

<script>
		$(function(){
			$("#content").keyup(function(e){
				$("#preview").html(content);			
			});
		});
</script>
