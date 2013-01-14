<h1>Unix Timestamp Converter</h1>

<p>
	The Unix Timestamp is the number of seconds since the Unix epoch, which is
  	January 1st 1970 00:00 UTC.
</p>
<p>
  	To grab a time before the epoch just use a negative number, for example 
  	<code>-86400</code> is one day before the Unix epoch.  Try it!
</p>

<?php echo $val->show_errors(); ?>

<?php echo Form::open(array('class' => 'form-horizontal', 'action' => Uri::current().'#results')); ?>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Full date to convert</label>
    <div class="controls">
      <?php echo Form::input('datetoconvert', \Input::Post('datetoconvert'), array('placeholder' => 'Time and date', 'class' => 'timepicker')); ?>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Timestamp to convert</label>
    <div class="controls">
      <?php echo Form::input('timestamptoconvert', \Input::Post('timestamptoconvert'), array('placeholder' => 'Timestamp')); ?>
    </div>
  </div>
  <div class="form-actions">
    <?php echo Form::submit('submit', 'Convert', array('class' => 'btn')); ?>
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

<?php if(!empty($date)): ?>
<div class="well">
	<h2>Date for <em><?php echo \Input::Post('timestamptoconvert'); ?></em>:</h2>
	<div class="code">
		<?= $date ?>
	</div>
</div>
<?php endif; ?>