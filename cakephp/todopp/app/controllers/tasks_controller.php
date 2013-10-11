<?php
class TasksController extends AppController {
  var $name = 'Tasks';
  var $uses = array('Task');
  var $components = array('Auth','Session','Security','RequestHandler');
  var $helpers = array(
    'Html',
    'Javascript',
    'Ajax',
  );
  var $paginate = array(
   'limit' => 5,
   'order' => array(
     'Task.created' => 'desc'
   )
  );
  function beforeFilter()
  {
     App::import('Sanitize');
     # $this->Auth->allow('index', 'view');
     $this->Auth->authError = '荳~M正縷Aｪ縷B~M縷P縷D縷Sで縷A~Y縷B';
     $this->Auth->logoutRedirect = array(Configure::read('Routing.admin')         => false, 'controller' => 'posts', 'action' => 'index');
     $this->Security->requireAuth();
     $this->Security->blackHoleCallback = 'error';
     $this->set('user',$this->Auth->user());
     $this->set('title_for_layout', 'ぱっとTODO');
  }
  function index() {
	$this->Task->recursive = 0;
	$this->__sanitize();
	// $this->set('tasks', $this->pagenate());
	$conditions = array('status' => 'yet');
	$order = array('Task.created asc');
	$this->set('yet_tasks', $this->Task->find('all',array( 'conditions' => $conditions, 'order' => $order)));
	$conditions = array('status' => 'done');
	$order = array('Task.modified desc');
	$this->set('done_tasks', $this->Task->find('all',array( 'conditions' => $conditions, 'order' => $order)));
	$this->pageTitle = 'タスク一覧';
  }
  function add() {
// デバッグをする場合 debug('call function add !!');
    if (empty($this->data)) return; 
    if ($this->Task->save($this->data, true, array('content', 'created', 'modified'))) {
	$conditions = array('status' => 'yet');
	$order = array('Task.created asc');
	$this->set('yet_tasks', $this->Task->find('all',array( 'conditions' => $conditions, 'order' => $order)));
    	$this->layout = 'ajax';
        $this->Session->setFlash(__('タスクが追加されました',true));
        return;
    }
    $this->redirect(array('action'=>'index'));
  }
  function done($id = null) {
	if(!$id) return;
	$this->data = $this->Task->read(null, $id);
    	if ($this->data) {
      		$this->Task->save(array('status' => 'done'));
    	}
    	$this->redirect(array('action'=>'index'));
  }
  function edit($id = null) {
	if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('不正なタスクです。画面を更新後、再度実行してください。', true));
                 $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
             $this->__sanitize();
             if ($this->Task->save($this->data)) {
                 $this->Session->setFlash(__('タスクは保存されました。', true));
                 $this->redirect(array('action' => 'index'));
             } else {
                 $this->Session->setFlash(__('タスクの保存に失敗しました。再度実行してください。', true));
             }
        }
        if (empty($this->data)) {
             $this->__sanitize();
             $task = $this->Task->read(null, $id);
	     $this->data = $task;
	     $this->Task->save($task);
        }
	$this->set('task', $task);
	$this->pageTitle = 'タスクの編集 作成日:' . $task['Task']['created'];
  }
  function delete($id = null) {
	if (!$id) {
		$this->Session->setFlash(__('該当のタスクは削除されている可能性があります。画面を更新後、確認してください。', true));
	}
	if ($this->Task->delete($id)) {
		$this->Session->setFlash(__('タスクを削除しました。', true));
		$this->redirect(array('action'=>'index'));
	}
	$this->Session->setFlash(__('タスクの削除に失敗しました。', true));
	$this->redirect(array('action' => 'index'));
  }
}
?>
