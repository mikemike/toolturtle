<h1>Birthday Info</h1>

<p>
	Find out some interesting facts about your birthday,
    such as who shares your birthday or how many days old
    you are.
</p>

<?php echo $val->show_errors(); ?>
<?php if(!empty($error)): ?><div class="alert alert-error"><?= $error ?></div><?php endif; ?>

<?php echo Form::open(array('class' => 'form-horizontal', 'action' => Uri::current().'#results')); ?>
  <div class="control-group">
    <label class="control-label" for="birthday">Your Birthday</label>
    <div class="controls">
      <?php echo Form::input('birthday', \Input::Post('birthday'), array('placeholder' => 'Date', 'class' => 'datepicker input-small')); ?>
    </div>
  </div>
  <div class="form-actions">
    <?php echo Form::submit('submit', 'Calculate', array('class' => 'btn')); ?>
  </div>
<?php echo Form::close(); ?>

<a name="results"></a>
<?php if(!empty($futuredate_timestamp)): ?>
<div class="well">
  <p>
    In <?=date('Y', $futuredate_timestamp)?> you will be <strong><?=$interval['y']?></strong> years, <strong><?=$interval['m']?></strong> months and <strong><?=$interval['d']?></strong> days old.
  </p>
</div>
<?php endif; ?>