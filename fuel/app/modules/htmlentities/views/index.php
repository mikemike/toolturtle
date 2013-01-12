<p>
	The HTML entities tool converts some HTML using HTML entities.  
	For example, using HTML Entities &lt;html&gt; will become
	&amp;lt;html&amp;gt;.  You can also decode HTML Entities in
	the same way using the second text box.
</p>

<?php echo $val->show_errors(); ?>

<?php echo Form::open(array('class' => 'form-horizontal', 'action' => Uri::current().'#results')); ?>
  <div class="control-group">
    <label class="control-label" for="inputEmail">HTML to <strong>encode</strong></label>
    <div class="controls">
      <?php echo Form::textarea('toencode', \Input::Post('toencode'), array('placeholder' => 'Enter your HTML here', 'class' => 'input-xxlarge', 'style'=>'height:150px;')); ?>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">HTML to <strong>decode</strong></label>
    <div class="controls">
      <?php echo Form::textarea('todecode', \Input::Post('todecode'), array('placeholder' => 'Enter your HTML here', 'class' => 'input-xxlarge', 'style'=>'height:150px;')); ?>
    </div>
  </div>
  <div class="form-actions">
    <?php echo Form::submit('submit', 'Encode / Decode', array('class' => 'btn')); ?>
  </div>
<?php echo Form::close(); ?>

<a name="results"></a>
<?php if(!empty($encoded)): ?>
<div class="well">
	<h2>Encoded:</h2>
	<div class="code">
		<?php echo Form::textarea('', htmlentities($encoded), array('class' => 'input-xxlarge', 'style'=>'height:150px;')); ?>
	</div>
</div>
<?php endif; ?>

<?php if(!empty($decoded)): ?>
<div class="well">
	<h2>Decoded:</h2>
	<div class="code">
		<?php echo Form::textarea('', $decoded, array('class' => 'input-xxlarge', 'style'=>'height:150px;')); ?>
	</div>
</div>
<?php endif; ?>