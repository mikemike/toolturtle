<h1>Word Count Tool</h1>

<p>
	This tool calculates the number of words in the text given.
	Words are counted based on spaces and irregular characters
	in a word (for example, hell-no).
</p>

<?php echo $val->show_errors(); ?>

<?php echo Form::open(); ?>
	<?php echo Form::textarea('string', \Input::Post('string'), array('placeholder' => 'Enter your text here', 'class' => 'input-xxlarge', 'style'=>'height:150px;')); ?>
	<p><?php echo Form::submit('submit', 'Count', array('class' => 'btn')); ?></p>
<?php echo Form::close(); ?>

<?php if(!empty($calculated)): ?>
<div class="well">
	<div class="code"><?=$calculated?></div>
</div>
<?php endif; ?>