<!-- 
<head><?php echo $scripts_for_layout ?></head>
 -->
<html>
<?php echo $this->Html->css('login'); ?>

<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('User.username',array(
    'type' => 'text',
    'label' => 'IDを入力してください',
    )); ?>
<?php echo "<br />"; ?>
<?php echo $this->Form->input('User.password',array(
    'label' => 'パスワードを入力してください',
    )); ?>
<?php echo "<br />"; ?>
<?php echo $this->Form->button('<i class="icon-user icon-white"></i> ログイン', array(
    'type' => 'submit',
    'class' => 'btn btn-primary btn-large disabled',
    'escape' => false
));
?>

<?php echo $this->Form->end(); ?>
</html>

<!-- 
<?php echo $this->Form->submit('ログイン',array(
    'class' => "btn btn-primary btn-large disabled"
    )); ?>
 -->