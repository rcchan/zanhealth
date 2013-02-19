<div class="form well">
  <?php echo $this->Form->create('WorkRequest'); ?>
    <fieldset>
    <legend><?php echo __('Add Work Request'); ?></legend>
    <?php
      echo $this->Form->hidden('id');
      echo $this->Form->input('owner', array('label' => 'Assigned to'));
      echo $this->Form->input('item_id');
      echo $this->Form->input('date', array('label' => 'Received Date'));
      echo $this->Form->input('expire', array('label' => 'Required Date'));
      echo $this->Form->input('work_priority_id');
      echo $this->Form->input('type');
      echo $this->Form->input('status', array('options' => array('Open' => 'Open', 'Closed' => 'Closed')));
      echo $this->Form->input('requestor_id', array('selected' => $user['id']));
      echo $this->Form->input('work_trade_id');
    ?>
    <br />
    <?php echo $this->Form->input('description', array('div' => 'description')); ?>
    <br />
    <?php
      echo $this->Form->input('cause_description');
      echo $this->Form->input('actions_taken');
      echo $this->Form->input('prevention_taken');
      echo $this->Form->input('facility_comments');
      echo $this->Form->input('engineer_comments');
      echo $this->Form->input('manager_comments');
    ?>
    </fieldset>
  <?php echo $this->Form->end(__('Submit')); ?>
</div>