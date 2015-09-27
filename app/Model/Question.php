<?php
class Question extends AppModel{
	public $name = 'Question';
	public function fetchMadeQuestionsList($user_id){
		$list = $this->find('all',array(
			'conditions' => array(
				'Question.user_id' => $user_id,
				)));
		return $list;
	}
}
?>
