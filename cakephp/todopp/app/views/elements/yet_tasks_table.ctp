<table>
<tr>
<th><?php __('タスク内容'); ?></th>
<th><?php __('状態'); ?></th>
<th><?php __('操作'); ?></th>
<th><?php __('作成日'); ?></th>
</tr>
<?php foreach ($yet_tasks as $task) { ?>
<tr>
<td><?php echo h($task['Task']['content']) ?></td>
<td><?php echo h($task['Task']['status']) ?></td>
<td>
<table><tbody><tr>
<td>
<?php
echo $this->Html->link(__('完了', true), array('action' => 'done', $task['Task']['id']), null, sprintf(__('完了にしますがよろしいですか？ %s行 目', true), $task['Task']['id']));
?></td>
<td>
<?php echo $html->link(__('編集', true), array('action'=>'edit', $task['Task']['id'])) ?>
</td>
<td>
<?php
echo $this->Html->link(__('削除', true), array('action' => 'delete', $task['Task']['id']), null, sprintf(__('削除しますがよろしいですか？ %s行 目', true), $task['Task']['id']));
?></td>
</tr></tbody></table>
</td>
<td><?php echo h($task['Task']['created']) ?></td>
</tr>
<?php } ?>
</table>

