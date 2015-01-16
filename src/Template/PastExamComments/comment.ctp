<?php if($comment):?>
<?= $this->element("comment_to_question",compact("comment","userId"))?>
<?php else:?>
エラーが発生しました。もう一度お試しください。それでもエラーが出る場合は管理者に連絡してください。
<?php endif;?>
