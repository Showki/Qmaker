<div class="text-center">
<?php
echo $this->Form->create('makes',array(
	'type' => 'post',
	'action' => 'general_add'
));
echo $this->Form->input('question',array(
	'type' => 'textarea',
	'value' => $data['makes']['question'],
	'label' => '問題文を編集してください'
	));
echo $this->Form->input('answer',array(
	'value' => $data['makes']['answer'],
	'label' => '答を編集してください'
	));
echo "<br />";
echo "かかった時間を編集してください"."<br />";
echo $this->Form->input('time_m', array(
	'label' => false, 
    'type' => 'select', 
    'options' => $data['time']['minute'],
    'div' => false,
    'selected' => $data['makes']['time_m']
    ));
echo " 分 ";	
echo $this->Form->input('time_s', array( 
	'label' => false,
    'type' => 'select', 
    'options' => $data['time']['second'],
    'div' => false,
    'selected' => $data['makes']['time_s']
    ));
echo " 秒 ";
echo "<br /><br />";
echo $this->Form->submit('決定',array(
	'class' => 'btn btn-success btn-large',
	'name' => 'general_edit',
	));
?>

</div>