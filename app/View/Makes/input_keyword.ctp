<!--
<head><?php echo $scripts_for_layout ?></head>
 -->
<html>

<?php echo $this->Session->flash(); ?>

<?php echo $this->Form->create('Make',array(
    'type' => 'post',
    'action' => 'showKeywordsList'
));
?>
<?php echo $this->Form->input('Make.keyword',array(
    'type' => 'text',
    'label' => 'キーワードを入力してください',
    )); ?>
<?php echo "<br />"; ?>
<?php echo $this->Form->button('<i class="icon-user icon-white"></i> 検索', array(
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
