<?php echo $javascript->link('prototype'); ?>
<p><?php echo $this->Html->link(__('ログアウト', true), array('controller' => 'users', 'action' => 'logout')); 
?></p>
<p>
<?php 
echo $ajax->form('add', 'post', array('update' => 'yet_tasks'));
echo $form->input('content', array('label' => '', 'type' => 'text'));    
echo $form->submit('タスクを追加'); 
?>
</form>
</p>

<h2><?php __('未完了タスク'); ?></h2>
<div id="yet_tasks">
<?php echo $this->element('yet_tasks_table'); ?>
</div>

<h2><?php __('完了タスク'); ?></h2>
<table>
<tr>
<th><?php //echo $this->Paginator->sort('タスク内??','content'); 
	__('タスク内容');
?></th>
<th><?php // echo $this->Paginator->sort('状態','status'); 
	__('状態');
?></th>
<th><?php // echo $this->Paginator->sort('作成日','created'); 
	__('操作');
?></th>
<th><?php // echo $this->Paginator->sort('作成日','created'); 
	__('作成日');
?></th>
</tr>
<?php foreach ($done_tasks as $task) { ?>
<tr>
<td><?php echo h($task['Task']['content']) ?></td>
<td><?php echo h($task['Task']['status']) ?></td>
<td>
<?php
echo $this->Html->link(__('削除', true), array('action' => 'delete', $task['Task']['id']), null, sprintf(__('削除しますがよろしいですか？ %s行 目', true), $task['Task']['id']));
?></td>
<td><?php echo h($task['Task']['created']) ?></td>
</tr>
<?php } ?>
</table>
