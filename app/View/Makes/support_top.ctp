<div class="text-center">
<?php echo $this->Html->link(
	sprintf('<i class="icon-arrow-left icon-white"></i>%s',__(' 戻る')),
	array('controller'=>'makes','action'=>'top'),
	array('class'=>'btn btn-inverse btn-large','escape'=>false)
	);
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(
	sprintf('<i class="icon-pencil icon-white "></i>%s',__(' 作問する')),
	array('controller'=>'makes','action'=>'support_select'),
	array('class'=>'btn btn-danger btn-large','escape'=>false)
	);
?>
<br />
<br />
	<h2>支援機能を用いて現在まで作成した問題リスト</h2>
</div>
<table>
	<tr>
		<th class="question_area"><h5>問題文</h5></th>		
		<th class="answer_area"><h5>回答</h5></th>
		<th class="time_area"><h5>経過時間</h5></th>
	</tr>
	<?php if(!empty($data)): ?>
<?php foreach ($data as $key => $value): ?>

	<tr>
		<td><?php echo $value['Question']['question'] ?></td>
		<td><?php echo $value['Question']['answer'] ?></td>
		<td><?php echo $value['Question']['time_m'] ."分".$value['Question']['time_m']."秒" ?>
		</td>
	</tr>
<?php endforeach; ?>
<? else :?>
<h2>未登録</h2>
<? endif; ?>
</table>
<br />
<!-- 
<?php echo $this->HTML->link('作問する',array('controller'=>'makes','action'=>'support_select')) ?>
<?php echo $this->HTML->link('戻る',array('controller'=>'makes','action'=>'top')) ?>
<?php pr($data) ?>
 -->