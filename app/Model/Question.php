<?php
class Question extends AppModel{
	public $name = 'Question';

	public function general_list($user_id){
		$list = $this->find('all',array(
			'conditions' => array(
				'Question.user_id' => $user_id,
				'Question.kind_flg' => 0
				)));

		return $list;
	}
	public function support_list($user_id){
		$list = $this->find('all',array(
			'conditions' => array(
				'Question.user_id' => $user_id,
				'Question.kind_flg' => 1
				)));

		return $list;
	}
}
?>

