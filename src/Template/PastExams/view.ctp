<div class="pastExams view large-10 medium-9 columns">
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Module') ?></h6>
			<p><?= $pastExam->has('module') ? $this->Html->link($pastExam->module->name, ['controller' => 'Modules', 'action' => 'view', $pastExam->module->id]) : '' ?></p>
			<h6 class="subheader"><?= __('User') ?></h6>
			<p><?= $pastExam->has('user') ? $this->Html->link($pastExam->user->username, ['controller' => 'Users', 'action' => 'view', $pastExam->user->id]) : '' ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($pastExam->modified) ?></p>
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($pastExam->created) ?></p>
		</div>
	</div>
	<div class="row texts">
		<div class="columns large-9">
			<h6 class="subheader"><?= __('Content') ?></h6>
			<?= $this->Html->link("PDFとしてエクスポートする","/pdf/pastexam_".$pastExam->id.".pdf",["download"=>"pastexam_".$pastExam->id])?>

			<?php
				$Pandoc = new Pandoc\Pandoc();
				$text = $pastExam->content;
				$text = $Pandoc->convert($text,"markdown_strict","html5");
				$text = $this->Text->autoParagraph($text);
				echo $text;
			?>
		</div>
	</div>
	<div class="comments_to_question">
		<?php foreach($pastExam->past_exam_comments as $comment):?>
			<?= $this->element("comment_to_question",compact("comment","userId"))?>
		<?php endforeach;?>
	</div>
	<div class="comment_area_to_question">
	<?= $this->Html->link("コメントする","#",["class"=>"link_to_comment_to_question"])?>
	<?= $this->Form->textarea("content",["class"=>"comment_box_to_question","style"=>"display:none;"])?>
	<?= $this->Form->button("コメントする",["class"=>"do_comment","style"=>"display:none;"])?>
	</div>
	<div class="answers">
		<?php foreach($pastExam->past_exam_solutions as $elem):?>
			<div class="answer" data-sol_id="<?=$elem->id?>">
				<div class="content"><?=$elem->content?></div>
				<div class="username">answered by <?=$this->Html->link($elem->user->username,["controller"=>"Users","action"=>"user_info",$elem->user->id])?></div>
				<div class="comments_to_answer">
				<?php foreach($elem->past_exam_solution_comments as $comment):?>
				<?= $this->element("comment_to_answer",compact("comment","userId"))?>
				<?php endforeach;?>
				</div>
				<div class="comment_area_to_answer">
					<?= $this->Html->link("コメントする","#",["class"=>"link_to_comment_to_answer"])?>
					<?= $this->Form->textarea("content",["class"=>"comment_box_to_answer","style"=>"display:none;"])?>
					<?= $this->Form->button("コメントする",["class"=>"do_comment","style"=>"display:none;"])?>
				</div>
			</div>
		<?php endforeach;?>
	</div>
	<?= $this->Form->create($pastExamSolution,["url"=>["controller"=>"PastExams","action"=>"addPastExamSolution"]]) ?>
		<div class="answer_box">
		<?= $this->Form->input("past_exam_id",["value"=>$pastExam->id,"type"=>"hidden"])?>
		<?= $this->Form->textarea("content",["id"=>"answer_box","rows"=>7])?>
		</div>
	<?= $this->Form->button(__('解答を投稿する')) ?>
	<?= $this->Form->end() ?>
	<?= $this->Url->build(["controller"=>"PastExams","action"=>"view"],true);?>
</div>

<script>
	$(function(){
		$(".link_to_comment_to_question").click(function(e){
			e.preventDefault();
			$(this).hide();
			$(this).parent().find(".comment_box_to_question").show();
			$(this).parent().find(".do_comment").show();
		});	

		$(".comment_area_to_question > .do_comment").click(function(e){
			e.preventDefault();
			console.log(window.location.origin+"<?=$this->Url->build(["controller"=>"PastExamComments","action"=>"add"])?>");
			var past_exam = $(this).parent().parent();
			$.post(
				"<?=$this->Url->build(["controller"=>"PastExamComments","action"=>"add"],true)?>",
				{
					"PastExamComments":{
						"past_exam_id":"<?= $pastExam->id?>",
						"content":past_exam.find(".comment_box_to_question").val()
					}
				},
				function(data){
					past_exam.find(".comments_to_question").append(data);	
					past_exam.find(".comment_area_to_question > .do_comment").hide();
					past_exam.find(".comment_area_to_question > .comment_box_to_question").hide();
					past_exam.find(".comment_area_to_question > .link_to_comment_to_question").show();
					MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
				}
			);	
		});

		$(".link_to_comment_to_answer").click(function(e){
			e.preventDefault();
			$(this).hide();
			$(this).parent().find(".comment_box_to_answer").show();
			$(this).parent().find(".do_comment").show();
		});

		$(".comment_area_to_answer>.do_comment").click(function(e){
			e.preventDefault();
			console.log(window.location.origin+"<?=$this->Url->build(["controller"=>"PastExamSolutionComments","action"=>"add"])?>");
			var exam_sol = $(this).parent().parent();
			$.post(
				"<?=$this->Url->build(["controller"=>"PastExamSolutionComments","action"=>"add"],true)?>",
				{
					"PastExamSolutionComments":{
						"past_exam_solution_id":exam_sol.data("sol_id"),
						"content":exam_sol.find(".comment_box_to_answer").val()
					}
				},
				function(data){
					exam_sol.find(".comments_to_answer").append(data);	
					exam_sol.find(".comment_area_to_answer > .do_comment").hide();
					exam_sol.find(".comment_area_to_answer > .comment_box_to_answer").hide();
					exam_sol.find(".comment_area_to_answer > .link_to_comment_to_answer").show();
					MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
				}
			);	
		});

		//this one works for either static and dynamically added DOM
		$(document).on("click",".delete_comment_to_answer",function(e){
			var target = $(this).parent();
			e.preventDefault();
			var ok = confirm("しっかりと考えてからコメントするようにしましょう。本当に削除しますか?");
			if(ok){
				$.post(
					"<?= $this->Url->build(["controller"=>"PastExamSolutionComments","action"=>"delete"],true)?>/"+$(this).parent().data("comment_id"),
					function(data){
						target.remove();
					}	
				);
			}	
		});

		//this one works for either static and dynamically added DOM
		$(document).on("click",".delete_comment_to_question",function(e){
			var target = $(this).parent();
			e.preventDefault();
			var ok = confirm("しっかりと考えてからコメントするようにしましょう。本当に削除しますか?");
			if(ok){
				$.post(
					"<?= $this->Url->build(["controller"=>"PastExamComments","action"=>"delete"],true)?>/"+$(this).parent().data("comment_id"),
					function(data){
						target.remove();
					}	
				);
			}	
		});
	});
</script>
