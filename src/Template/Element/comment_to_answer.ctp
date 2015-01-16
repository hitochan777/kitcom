<!--
This element requires

PastExamSolutionComments\Entity $comment
number $userId

-->
<div class="comment_to_answer" data-comment_id="<?= $comment->id?>" >
	<?php 
		$Pandoc = new Pandoc\Pandoc();
		$text = $comment->content;
		$text = $Pandoc->convert($text,"markdown_strict","html5");
		$text = $this->Text->autoParagraph($text);
		echo $text." - ".$this->Html->link($comment->user->username,["controller"=>"Users","action"=>"user_info",$comment->user->id])?>
	<?php
		if($comment->user->id==$userId){
			echo $this->Html->link("削除","#",["class"=>"delete_comment_to_answer"]);
		}
	?>
</div>
