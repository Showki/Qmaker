<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
	public $uses = array('User');
	public function beforeFilter() {
	    parent::beforeFilter();
	    // ユーザー自身による登録とログアウトを許可する
	    $this->Auth->allow('useradd', 'logout');
	}
	public function login() {
		$this->layout = 'bootstrap';
	    if($this->request->is('post')) {
	        if($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());
	        }else{
	            $this->Session->setFlash(__('IDかパスワードが違うみたいなので確認してください'));
	        }
	    }
	}
	public function logout() {
	    $this->redirect($this->Auth->logout());
	}
	public function index() {
		return $this->redirect(array('controller'=>'makes','action' => 'index'));
	}
	public function useradd() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('保存しました．'));
				return $this->redirect(array('action' => 'useradd'));
			} else {
				$this->Session->setFlash(__('保存できません．ごめんなさい．'));
			}
		}
	}
}
