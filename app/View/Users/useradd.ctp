<!-- <div id="hero-unit">
    新規ユーザー登録
    <?php echo $this->Session->flash('Auth'); ?>
    <?php echo $this->Form->create('User', array('url' => 'add')); ?>
    <?php echo $this->Form->input('User.student_no',array('label'=>'ユーザ名')); ?>
    <?php echo $this->Form->input('User.password',array('label'=>'パスワード')); ?>
    <?php echo $this->Form->end('新規ユーザを作成する'); ?>
    <a href="login" id="switch2" class="label btn-primary">ログインへ</a>
</div> -->

<!-- <div id="hero-unit">
    新規ユーザー登録
    <?php echo $this->Session->flash('Auth'); ?>
    <?php echo $this->Form->create('User', array('url' => 'useradd')); ?>
    <?php echo $this->Form->input('User.student_no',array('label'=>'ユーザ名')); ?>
    <?php echo $this->Form->input('User.password',array('label'=>'パスワード')); ?>
    <?php echo $this->Form->end('新規ユーザを作成する'); ?>
    <a href="login" id="switch2" class="label btn-primary">ログインへ</a>
</div>

 -->

<!-- <div class="users form"> -->
<?php echo $this->Form->create('User'); ?>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
	?>
<?php echo $this->Form->end(__('Submit')); ?>
