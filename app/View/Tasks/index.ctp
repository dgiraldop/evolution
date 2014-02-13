<?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/angularjs/1.2.12/angular.min.js', array('inline' => false)) ?>
<?php echo $this->Html->script('tasks.js', array('inline' => false)) ?>
<?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', array('inline' => false)) ?>
<?php echo $this->Html->script('fancybox/jquery.fancybox.js?v=2.0.6', array('inline' => false)) ?>
<?php echo $this->Html->script('modal.js', array('inline' => false)) ?>

<?php $create_url = Router::url( array('controller' => 'tasks', 'action' => 'create' )) ?>
<?php $delete_url = Router::url( array('controller' => 'tasks', 'action' => 'delete' )) ?>
<?php $json_tasks = Router::url( array('controller' => 'tasks', 'action' => 'json_tasks' )) ?>

<?php echo $this->Html->link( 'Users list', array( 'controller' => 'users', 'action' => 'index' ) ); ?>

<p><a class="modalbox" href="#inline">Add a new task</a></p>



<div data-content-type="tasks_dashboard" data-ng-app="TaskApp" data-ng-controller="TasksCtrl">
  <div data-page-element="task_editor" id="inline">
    <?php
      echo $this->Form->create('Task', array('action' => 'create'));
      echo $this->Form->input('name', array('data-ng-model' => 'task.name'));
      echo $this->Form->input('priority', array('data-ng-model' => 'task.priority'));
      echo $this->Form->input('due_date', array('type' => 'text', 'data-ng-model' => 'task.due_date'));
      echo $this->Form->input('create_url', array('type' => 'hidden',
                                                  'data-ng-init' => 'create_url="'.$create_url.'"'
                                                  ));
      echo $this->Form->input('delete_url', array('type' => 'hidden',
                                                  'data-ng-init' => 'delete_url="'.$delete_url.'"'
                                                  ));
      echo $this->Form->input('json_tasks', array('type' => 'hidden',
                                                  'data-ng-init' => 'json_tasks="'.$json_tasks.'"'
                                                  ));
      echo $this->Form->button('Submit', array('type' => 'button', 'data-ng-click="process_task(task)"'));
    ?>
  </div>
  <div data-page-element="my_tasks">
    <table>
      <thead>
      <tr>
        <th>name</th>
        <th>priority</th>
        <th>due date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>
      </thead>
      <tbody>
      <tr data-ng-repeat="task in tasks">
        <td><span>{{task.Task.name}}</span></td>
        <td><span>{{task.Task.priority}}</span></td>
        <td><span>{{task.Task.due_date}}</span></td>
        <td><span><a data-ng-click="edit_task(task)" class="modalbox" href="#inline">Edit</a></td>
        <td><span><a data-ng-confirm-click="are you sure?" data-confirmed-click="delete_task(task)">Delete</a></td>
      </tr>
      </tbody>
  </div>


</div>


