<div class="text-center">

<?php echo $this->Html->link(
	sprintf('<i class="icon-arrow-left icon-white"></i>%s',__(' 戻る')),
	array('controller'=>'makes','action'=>'top'),
	array('class'=>'btn btn-inverse btn-large','escape'=>false)
	);
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $this->Html->link(
	sprintf('<i class="icon-pencil icon-white "></i>%s',__('更新する')),
	array('controller'=>'makes','action'=>'general_select'),
	array('class'=>'btn btn-danger btn-large','escape'=>false)
	);
?>
<br />
<br />
	<h2>提案リスト</h2>
</div>
<table class="table">
	<tr>
		<th class="question_area_01"><h5>問題文</h5></th>		
		<th class="answer_area_01"><h5>回答</h5></th>
		<td class="btn_area"><h5></h5></td>
	</tr>
<?php foreach ($data as $key => $value): ?>
	<tr>
		<td><h5><?php echo $value['question'] ?></h5></td>
		<td><h5><?php echo $value['answer'] ?></h5></td>
		<td>
			<?php echo $this->form->create('makes',array('type'=>'post','action'=>'support_make')) ?>
			<?php echo $this->form->hidden('question',array('value' => $value['question'])) ?>
			<?php echo $this->form->hidden('answer',array('value' => $value['answer'])) ?>
			<?php echo $this->Form->submit('これを使う', array(
			    'name' => 'support_select',
			    'class' => 'btn btn-success',
			    'escape' => false
			));
			?>
			<?php echo $this->form->end(); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<!-- 

<?php echo $this->HTML->link('戻る',array('controller'=>'makes','action'=>'top')) ?>

<?php
 // foreach ($data as $key => $value) {
 // 	pr($value);
 // 	pr($key);
 // }


?>





 <?php //pr($data) ?>
 			<?php echo $this->form->submit('これを使う',array(
				//	'class' => "btn btn-primary btn-large"
				'name' => 'support_select',
			))?>
			 --> 