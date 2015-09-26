<?php
App::uses('AppController', 'Controller');

class MakesController extends AppController {
	public $uses = array('User');

	public function index(){

	}

	public function input_keyword(){
		$this->layout = 'default_make';
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
