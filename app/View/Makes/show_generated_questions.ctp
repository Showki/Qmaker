<div class="text-center">

<?php echo $this->Html->link(
	sprintf('<i class="icon-arrow-left icon-white"></i>%s',__(' 戻る')),
	array('controller'=>'makes','action'=>'top'),
	array('class'=>'btn btn-inverse btn-large','escape'=>false)
	);
?>

<br />
<br />
	<h2>自動生成した提案リスト</h2>
</div>
<table class="table">
	<tr>
		<th class="question_area_01"><h5>問題文</h5></th>
		<th class="answer_area_01"><h5>回答</h5></th>
		<td class="btn_area"><h5></h5></td>
	</tr>
<?php foreach ($generated_questions as $question): ?>
	<tr>
		<td><h5><?php echo $question['sentence'] ?></h5></td>
		<td><h5><?php echo $question['answer'] ?></h5></td>
		<td>
			<?php echo $this->form->create('makes',array('type'=>'post','action'=>'editGeneratedQuestions')) ?>

            <?php echo $this->form->hidden('sentence',array('value' => $question['sentence'])) ?>
			<?php echo $this->form->hidden('answer',array('value' => $question['answer'])) ?>
            <?php echo $this->form->hidden('use_template',array('value' => $question['use_template'])) ?>
            <?php echo $this->form->hidden('use_knowledge',array('value' => $question['use_knowledge'])) ?>

			<?php echo $this->Form->submit('これを使う', array(
			    'name' => 'question_select',
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
