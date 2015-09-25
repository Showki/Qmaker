<div class="text-center">
<?php echo $this->Form->create('makes',array(
	'type' => 'post',
	'action' => 'support_check'
));?>
<?php echo $this->Form->input('question',array(
	'type' => 'textarea',
	'label' => '選択した問題文を編集してください',
	'value' => $data['makes']['question']
	));?>
<?php echo $this->Form->input('answer',array(
	'type' => 'textarea',
	'label' => '選択した答を編集してください',
	'value' => $data['makes']['answer']
	));?>
<br />
かかった時間を入力してください<br />
<?php echo $this->Form->input('time_m', array(
	'label' => false, 
    'type' => 'select', 
    'options' => $data['time']['minute'],
    'div' => false,
    'selected' => 10
    ));?>
 分 	
<?php echo $this->Form->input('time_s', array( 
	'label' => false,
    'type' => 'select', 
    'options' => $data['time']['second'],
    'div' => false,
    'selected' => 30
    ));?>
 秒 
 <br /> <br />
 
<?php echo $this->Form->submit('決定',array(
	'name' => "support_make",
	'class' => 'btn btn-success btn-large',
	));?>

<!-- 
<?php echo $this->Form->submit('決定', array(
    'name' => 'support_select',
    
));
?>

 -->
</div>