<?php
class UsersController extends AppController {
	var $name = 'Users';
	var $components = array('Auth','Session','Security');
	function beforeFilter(){
		App::import('Sanitize');
		Security::setHash('sha256');
		$this->Auth->allow('login','logout','add');
		$this->Auth->authorize = 'controller'; // 認証成功後の追加処理を行う場所を指定
		// ログインしていないときのリダイレクト先
		$this->Auth->loginAction = array('admin' => false,
			 'controller' => 'users', 
			 'action' => 'login' ); 
		// ログイン成功後のリダイレクト先
        	$this->Auth->loginRedirect = array('controller' => 'tasks',
			 'action' => 'index' ); 
	 	$this->set('title_for_layout', 'ログイン認証');
	}
	/**
        * 認証に成功した際に呼ばれる。
        * (Auth->authorizeに'controller'をセットすることが必要）
        */
        function isAuthorized()  {
           $this->Session->setFlash(
             __('ログインに成功しました。（ユーザ名：' 
               . $this->Auth->user('username') . ')', true));
           return true;
        }
	function login(){ 
		if ($this->Auth->user()) {
            		$this->Session->setFlash(
                		__('既にログインしています。（ユーザ名：' 
				. $this->Auth->user('username') . ')', true)
            		);
        	}else{
			$this->set("user", Sanitize::stripAll($this->Auth->user()));
		}
	}
	function logout(){
		$this->Auth->logout(); 
	}
	public function add() {
        	if(!empty($this->data)) {
            		$this->User->create();
            		$this->User->save($this->data['User']);
			$this->set("user", Sanitize::stripAll($this->Auth->user()));
            		$this->redirect('./login');
        	}
 	}
}
