<p><h1>タスクの編集</h1>&nbsp;&nbsp;
<a href="<?php echo h($this->Html->url(array('controller'=>'tasks', 'action'=>'index'))); ?>">タスク一覧へ戻る</a></p>

<form action="<?php echo h($this->Html->url(array('controller'=>'tasks', 'action'=>'edit', $task['Task']['id']))) ?>" method="post">
<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $task['Task']['id'])); ?>
<br>
<h2>内容</h2>
<p><?php echo $form->textarea('content', array('cols' => '60', 'rows' => '3', 'value' => $task['Task']['content'])); ?></p>

<p><input type="submit" value="保存"></p>
