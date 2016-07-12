<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array('Session','Js','Time','Html','Form','Paginator');

	public $components = array(
//		'DebugKit.Toolbar',
		'Session',
        'Auth' => array( //ログイン機能を利用する
                //ログイン後の移動先
                'loginRedirect' => array('controller' => 'makes', 'action' => 'index'),
                //ログアウト後の移動先
                'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
                //ログインページのパス
                'loginAction' => array('controller' => 'users', 'action' => 'login'),
                //未ログイン時のメッセージ
                'authError' => 'ユーザIDとパスワードを入力してください',
            )
	);
    public function beforeFilter() {
        // 認証不要のアクション指定（AppControllerなので複数のコントローラ間で横断的に指定していることを意味）
        $this->Auth->allow('useradd');
        // $this->layout = 'bootstrap';
        $this->layout = 'default_make';
    }

}
