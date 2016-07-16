<?php
App::uses('AppController', 'Controller');

class MakesController extends AppController {
	public $uses = array('User','Knowledge','Template','Question','Activity');

	public function index(){
		return $this->redirect(array('action' => 'top'));
	}

	public function top(){
		$top_view['user_name'] = $this->Auth->user('username');
		$top_view['made_questions_list'] = $this->Question->fetchMadeQuestionsList($this->Auth->user('id'));

		$activity_data['Activity']['user_id'] = $this->Auth->user('id');
		$activity_data['Activity']['activity_detail'] = "Login";
		$this->Activity->save($activity_data);

		$this->set('top_view',$top_view);
	}

	public function inputKeyword(){
		$this->layout = 'bootstrap';
	}

	public function showKeywordsList(){
		if(empty($this->request->data['Make']['keyword']))
			return $this->redirect(array('action' => 'top'));

		$keyword = $this->request->data['Make']['keyword'];
		$keywords_list = $this->Knowledge->fetchObjectByKeyword($keyword);

		$activity_data['Activity']['user_id'] = $this->Auth->user('id');
		$activity_data['Activity']['activity_detail'] = 'Input ['.$keyword.']';
		$this->Activity->save($activity_data);

		if(!isset($keywords_list)){
			$this->Session->setFlash(__('検索結果が 0件であったため、検索画面に戻ります'));
			$this->redirect(array('controller'=>'makes','action'=>'inputKeyword'));
		}else{
			$this->set("keywords_list",$keywords_list);
		}
	}

	public function showGeneratedQuestions($selected_keyword){
		if(empty($selected_keyword))
			return $this->redirect(array('action' => 'top'));

		$searched_knowledge = $this->Knowledge->fetchKnowledge($selected_keyword);

		$activity_data['Activity']['user_id'] = $this->Auth->user('id');
		$activity_data['Activity']['activity_detail'] = 'After input keyword , chose keyword list ['.$selected_keyword.']';
		$this->Activity->save($activity_data);

		$object_list = $this->Knowledge->fetchObject();
		$generated_questions = $this->Template->generateQuestions($searched_knowledge,$object_list);
          $this->set("generated_questions",$generated_questions);
	}

	public function editGeneratedQuestions(){
		if(empty($this->request->data['question_select']))
			return $this->redirect(array('action' => 'top'));

		$selected_question = $this->request->data;
		$this->Session->write('Selected.sentence',$selected_question['makes']['sentence']);
		$this->Session->write('Selected.answer',$selected_question['makes']['answer']);
		$this->Session->write('Selected.use_template_id',$selected_question['makes']['use_template']);
		$this->Session->write('Selected.use_knowledge_id',$selected_question['makes']['use_knowledge']);

		$activity_data['Activity']['user_id'] = $this->Auth->user('id');
		$activity_data['Activity']['activity_detail'] = 'After chose keyword list , chose questions list [SENTENCE]'.$selected_question['makes']['sentence'].'[ANSWER]'.$selected_question['makes']['answer'].'[USE_TEMPLATE]'.$selected_question['makes']['use_template'].'[USE_KNOWLEDGE]'.$selected_question['makes']['use_knowledge'];
		$this->Activity->save($activity_data);

		$this->set('selected_question',$selected_question);
		// debug($selected_question);
	}
	public function registerGeneratedQuestions(){
		$this->autoRender = false;

		if(empty($this->request->data['decided_question']))
			return $this->redirect(array('action' => 'top'));

		$decided_question = $this->request->data;

		$this->Session->write('Decided.sentence',$decided_question['makes']['sentence']);
		$this->Session->write('Decided.answer',$decided_question['makes']['answer']);

		$register_data['Question']['user_id'] = $this->Auth->user('id');
		$register_data['Question']['sentence'] = $decided_question['makes']['sentence'];
		$register_data['Question']['answer'] = $decided_question['makes']['answer'];
		$register_data['Question']['resource_id'] = $this->Session->read('Selected.use_knowledge_id');
		$register_data['Question']['template_id'] = $this->Session->read('Selected.use_template_id');

		$activity_data['Activity']['user_id'] = $this->Auth->user('id');
		$activity_data['Activity']['activity_detail'] = 'After chose questions list , edit in [SENTENCE]'.$decided_question['makes']['sentence'].'[ANSWER]'.$decided_question['makes']['answer'].'[USE_TEMPLATE]'.$register_data['Question']['resource_id'].'[USE_KNOWLEDGE]'.$register_data['Question']['resource_id'];
		$this->Activity->save($activity_data);


		$this->Question->save($register_data);
		return $this->redirect(array('action' => 'top'));
	}

	public function countGeneratedQuestions()
	{
		$i = 0;
		$num = 150;
		$problem_counta = 0;

		$object_list = $this->Knowledge->fetchObject();
		foreach ($object_list as $key => $object) {
			// if($i >= $num){
				// break;
			// }else{
				$knowledge = $this->Knowledge->fetchKnowledge($object);
				$generated_questions[] = $this->Template->generateQuestions($knowledge,$object_list);
				foreach ($generated_questions as $object_num => $problems) {
					// $object_list_view["$object"] = count($problems);
					$object_list_view[] = count($problems);
				}
				// $i++;
			// }
		}
		// debug($object_list_view);
		$j = count($object_list);
		debug($j);
	}
}
