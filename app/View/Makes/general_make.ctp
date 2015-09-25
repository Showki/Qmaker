<div class="text-center">

<?php
echo $this->Form->create('makes',array(
	'type' => 'post',
	'action' => 'general_check'
));
echo $this->Form->input('question',array(
	'type' => 'textarea',
	'label' => '問題文を入力してください'
	));
echo $this->Form->input('answer',array(
	'type' => 'textarea',
	'label' => '答を入力してください'
	));
echo "<br />";
echo "かかった時間を入力してください"."<br />";
echo $this->Form->input('time_m', array(
	'label' => false, 
    'type' => 'select', 
    'options' => $data['time']['minute'],
    'div' => false,
    'selected' => 10
    ));
echo " 分 ";	
echo $this->Form->input('time_s', array( 
	'label' => false,
    'type' => 'select', 
    'options' => $data['time']['second'],
    'div' => false,
    'selected' => 30
    ));
echo " 秒 ";
echo "<br /><br />";
echo $this->Form->submit('決定',array(
	'class' => 'btn btn-success btn-large',
	'name' => 'general_make'
	));
?>

</div>