<div class="text-center">
<?php echo $this->Html->link(
	sprintf('<i class="icon-arrow-left icon-white"></i>%s',__(' ログアウト')),
	array('controller'=>'users','action'=>'logout'),
	array('class'=>'btn btn-inverse btn-large','escape'=>false)
	);
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(
	sprintf('<i class="icon-pencil icon-white "></i>%s',__(' 作問する')),
	array('controller'=>'makes','action'=>'inputKeyword'),
	array('class'=>'btn btn-danger btn-large','escape'=>false)
	);
?>
<br />
<br />
	<h2> <?php echo $top_view['user_name'] ?>さん が今まで作成した問題</h2>
</div>
<table>
	<tr>
		<th class="question_area"><h5>問題文</h5></th>
		<th class="answer_area"><h5>回答</h5></th>
	</tr>
	<?php if(!empty($top_view['made_questions_list'])): ?>
<?php foreach ($top_view['made_questions_list'] as $made_question): ?>
	<tr>
		<td><?php echo $made_question['Question']['sentence'] ?></td>
		<td><?php echo $made_question['Question']['answer'] ?></td>
		</td>
	</tr>
<?php endforeach; ?>
<?php else :?>
<h2>(未登録)</h2>
<?php endif; ?>
</table>
<br />
