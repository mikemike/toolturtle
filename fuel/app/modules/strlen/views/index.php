<p>
	This tool calculates the length of a string.  A string is a series
	of characters, this can be a sentance, word, paragraph, anything
	really.  Spaces are included in the count.
</p>

<?php echo $val->show_errors(); ?>

<?php echo Form::open(); ?>
	<?php echo Form::textarea('string', \Input::Post('string'), array('placeholder' => 'Enter your string here', 'class' => 'input-xxlarge', 'style'=>'height:150px;')); ?>
	<p><?php echo Form::submit('submit', 'Count', array('class' => 'btn')); ?></p>
<?php echo Form::close(); ?>

<?php if(!empty($calculated)): ?>
<div class="well">
	<div class="code"><?=$calculated?></div>
</div>
<?php endif; ?>