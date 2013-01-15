<h1>How Old Will I be In...</h1>

<p>
	Use this tool to work out <strong>how old you will be</strong>
  on a specific date in the future.
</p>
<p>
  Just give us your birthday and the future date you want to
  check your age on and we'll do the rest.
</p>
<p>
  Don't worry - we don't save anything you put in, so we won't
  be recording who you are or what your birthday is.
</p>

<?php echo $val->show_errors(); ?>

<?php echo Form::open(array('class' => 'form-horizontal', 'action' => Uri::current().'#results')); ?>
  <div class="control-group">
    <label class="control-label" for="birthday">Your Birthday</label>
    <div class="controls">
      <?php echo Form::input('birthday', \Input::Post('birthday'), array('placeholder' => 'Date', 'class' => 'datepicker input-small')); ?>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">How old will I be in...</label>
    <div class="controls">
      <?php echo Form::input('futuredate', \Input::Post('futuredate'), array('placeholder' => 'Date', 'class' => 'datepicker input-small')); ?>
    </div>
  </div>
  <div class="form-actions">
    <?php echo Form::submit('submit', 'Calculate', array('class' => 'btn')); ?>
  </div>
<?php echo Form::close(); ?>

<a name="results"></a>
<?php if(!empty($timestamp)): ?>
<div class="well">
	<h2>Timestamp for <em><?php echo \Input::Post('datetoconvert'); ?></em>:</h2>
	<div class="code">
		<?= $timestamp ?>
	</div>
</div>
<?php endif; ?>