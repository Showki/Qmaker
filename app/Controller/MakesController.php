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

	// public $uses = array('User','Question','Time','Template','Property1st','Property2nd','Object','FunctionQuestion');
	// public function index(){
	// 	$this->layout = 'default_make';
	//
	// 	$this->set('data',$this->User->find('first',array(
	// 	                'conditions' => array('User.id' => 3))
	// 	                ));
	// 	return $this->redirect(array('action' => 'top'));
	// }
	// public function top(){
	// 	$this->layout = 'default_make';
	// 	$this->layout = 'top';
	// }
	// // 通常の作問を行う
	// public function general_top(){
	// 	$this->layout = 'default_make';
	//
	// 	$data = $this->Question->general_list($this->Auth->user('id'));
	// 	$this->set('data',$data);
	// }
	// public function general_make(){
	// 	$this->layout = 'default_make';
	//
	// 	$data['time'] = $this->Time->timeMS_list();
	// 	$this->set('data',$data);
	// }
	// public function general_check(){
	// 	$this->layout = 'default_make';
	//
	// 	$data = $this->request->data;
	// 	if(empty($data['general_make'])){
	// 		$this->redirect(array(
	// 			'controller' => 'makes',
	// 			'action' => 'general_top'));
	// 	}else{
	// 		$this->set('data',$this->request->data);
	// 	}
	// 	// $this->set('data',$this->request->data);
	// }
	// public function general_edit(){
	// 	$this->layout = 'default_make';
	//
	// 	$data = $this->request->data;
	// 	if(empty($data['general_check'])){
	// 		$this->redirect(array(
	// 			'controller' => 'makes',
	// 			'action' => 'general_top'));
	// 	}else{
	// 		$data['time'] = $this->Time->timeMS_list();
	// 		$this->set('data',$data);
	// 	}
	// }
	// public function general_add(){
	// 	$this->layout = 'default_make';
	//
	// 	$data = $this->request->data;
	// 	if(empty($data['general_check_submit']) && empty($data['general_edit'])){
	// 		$this->redirect(array(
	// 			'controller' => 'makes',
	// 			'action' => 'general_top'));
	// 	}else{
	// 		$data['Question']['user_id'] = $this->Auth->user('id');
	// 		$data['Question']['kind_flg'] = 0;
	// 		$data['Question']['question'] = $data['makes']['question'];
	// 		$data['Question']['answer'] = $data['makes']['answer'];
	// 		$data['Question']['time_m'] = $data['makes']['time_m'];
	// 		$data['Question']['time_s'] = $data['makes']['time_s'];
	// 		// $this->set('data',$infoq);
	// 		$this->Question->save($data['Question']);
	// 	}
	// }

	// 支援機能を用いた作問を行う


	// 自動生成問題の出力 ※実行するべからず

	// public function output_question(){
	// 	$data['templates'] = $this->Template->find('all');
	// 	$data['associate1'] = $this->Property1st->find('all');
	// 	$data['associate2'] = $this->Property2nd->find('all');
	// 	$data['questions'] = $this->Template->funtion_making($data);
	//
	//
	// 	foreach ($data['questions'] as $row_num => $output_value) {
	// 			$this->FunctionQuestion->create(false);
	// 			$this->FunctionQuestion->save($output_value);
	// 	}
	// }



//
// 	public function support_top(){
// 		$this->layout = 'default_make';
//
// 		$data = $this->Question->support_list($this->Auth->user('id'));
// 		$this->set('data',$data);
// 	}
// 	public function support_select(){
// 		$this->layout = 'default_make';
//
// 		$data['templates'] = $this->Template->find('all');
// 		$data['associate1'] = $this->Property1st->find('all');
// 		$data['associate2'] = $this->Property2nd->find('all');
// 		$data['questions'] = $this->Template->generate($data);
//
// 		$this->set('data',$data['questions']);
// // $this->set('data',$data);
// 	}
// 	public function test(){
// 		$this->set('data',$this->request->data);
// 	}
// 	public function support_make(){
// 		$this->layout = 'default_make';
//
// 		$data = $this->request->data;
// 		if(empty($data['support_select'])){
// 			$this->redirect(array(
// 				'controller' => 'makes',
// 				'action' => 'support_top'));
// 		}else{
// 			$data['time'] = $this->Time->timeMS_list();
// 			$this->set('data',$data);
// 		}
//
// 	}
// 	public function support_check(){
// 		$this->layout = 'default_make';
//
// 		$data = $this->request->data;
// 		if(empty($data['support_make'])){
// 			$this->redirect(array(
// 				'controller' => 'makes',
// 				'action' => 'support_top'));
// 		}else{
// 			$this->set('data',$data);
// 		}
// 	}
// 	public function support_edit(){
// 		$this->layout = 'default_make';
//
// 		$data = $this->request->data;
// 		if(empty($data['support_edit'])){
// 			$this->redirect(array(
// 				'controller' => 'makes',
// 				'action' => 'support_top'));
// 		}else{
// 			$data['time'] = $this->Time->timeMS_list();
// 			$this->set('data',$data);
// 		}
// 	}
//
// 	public function support_add(){
// 		$this->layout = 'default_make';
//
// 		$data = $this->request->data;
// 		if(empty($data['support_check_submit']) && empty($data['support_edit'])){
// 			$this->redirect(array(
// 				'controller' => 'makes',
// 				'action' => 'support_top'));
// 		}else{
// 			$data['Question']['user_id'] = $this->Auth->user('id');
// 			$data['Question']['kind_flg'] = 1;
// 			$data['Question']['question'] = $data['makes']['question'];
// 			$data['Question']['answer'] = $data['makes']['answer'];
// 			$data['Question']['time_m'] = $data['makes']['time_m'];
// 			$data['Question']['time_s'] = $data['makes']['time_s'];
// 			// $this->set('data',$infoq);
//
// 			$this->Question->save($data['Question']);
// 			//$this->set('data',$data);
// 			// $this->redirect(array('action' => 'support_top'));
// 			// $this->redirect(array('action' => 'support_top'));
// 		}
// 	}

}
