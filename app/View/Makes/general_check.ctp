<div class="text-center">

<h2>【問題文】 <br /><?php echo $data['makes']['question'] ?></h2>
<h2>【回答】 <br /><?php echo $data['makes']['answer'] ?></h2>
<h2>【時間】 <br /><?php echo $data['makes']['time_m']."分 ". $data['makes']['time_s']."秒" ?></h2>
<!-- echo $this->Form->create('makes',array(
	'type' => 'post',
	'action' => 'general_check'
)); -->

<?php echo $this->form->create('makes',array('type'=>'post','action'=>'general_edit')) ?>
<?php echo $this->form->hidden('question',array('value' => $data['makes']['question'])) ?>
<?php echo $this->form->hidden('answer',array('value' => $data['makes']['answer'])) ?>
<?php echo $this->form->hidden('time_m',array('value' => $data['makes']['time_m'])) ?>
<?php echo $this->form->hidden('time_s',array('value' => $data['makes']['time_s'])) ?>
<?php echo $this->form->submit('編集する',array(
	'class' => 'btn btn-inverse btn-large',
	'name' => 'general_check',
	)) ?>
<?php echo $this->form->end() ?>

<?php echo $this->form->create('makes',array('type'=>'post','action'=>'general_add')) ?>
<?php echo $this->form->hidden('question',array('value' => $data['makes']['question'])) ?>
<?php echo $this->form->hidden('answer',array('value' => $data['makes']['answer'])) ?>
<?php echo $this->form->hidden('time_m',array('value' => $data['makes']['time_m'])) ?>
<?php echo $this->form->hidden('time_s',array('value' => $data['makes']['time_s'])) ?>
<?php echo $this->form->submit('確定',array(
		'class' => 'btn btn-success btn-large',
		'name' => 'general_check_submit',))?>
<?php echo $this->form->end() ?>
</div>