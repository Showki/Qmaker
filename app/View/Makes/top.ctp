

<?php echo $this->Html->link(
	sprintf('<i class="icon-pencil icon-white "></i>%s',__(' 通常の問題作成')),
	array('controller'=>'makes','action'=>'general_top'),
	array('class'=>'btn btn-danger btn-large btn-block','escape'=>false)
	);
?>
<br />
<?php echo $this->Html->link(
	sprintf('<i class="icon-pencil icon-white "></i>%s',__(' 支援機能を使った問題作成')),
	array('controller'=>'makes','action'=>'support_top'),
	array('class'=>'btn btn-danger btn-large btn-block','escape'=>false)
	);
?>
<br />
<?php echo $this->Html->link(
	sprintf('<i class="icon-share-alt "></i>%s',__(' タイマーです')),
	'http://stopwatchtimer.yokochou.com/',
	array('class'=>'btn btn-large btn-block',
		'escape'=>false,
		'target'=>'_blank')
	);
?>
<br />
<?php echo $this->Html->link(
	sprintf('<i class="icon-remove icon-white "></i>%s',__(' ログアウト')),
	array('controller'=>'users','action'=>'logout'),
	array('class'=>'btn btn-inverse btn-large btn-block','escape'=>false)
	);
?>