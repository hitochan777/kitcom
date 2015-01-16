<div class="columns large-10 small-9">
 <table class="table">
	<tr>
		<td>ユーザー名</td>
		<td><?= $user->username;?></td>
	</tr>
	<tr>
		<td>メールアドレス</td>
		<td><?= $user->email;?></td>
	</tr>
	<tr>
		<td>学部</td>
		<td></td>
	</tr>
</table>
<?= $this->Html->link("ユーザー情報編集",["controller"=>"Users","action"=>"edit"],["class"=>"btn btn-default"])?>
</div>
