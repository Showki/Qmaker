<h2>登録完了！</h2>
<?php echo $this->Html->link(
	sprintf('<i class="icon-arrow-left icon-white"></i>%s',__(' 戻る')),
	array('controller'=>'makes','action'=>'general_top'),
	array('class'=>'btn btn-inverse btn-large','escape'=>false)
	);
?>