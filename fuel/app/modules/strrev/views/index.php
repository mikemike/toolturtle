<h1><code>strrev</code> / String Reverse Tool</h1>

<p>
	Use this tool to reverse a text, sentance or word around.
	For example, the text 'hello there' would become: ereht olleh.
	Simple.
</p>

<?php echo $val->show_errors(); ?>

<?php echo Form::open(); ?>
	<?php echo Form::textarea('string', \Input::Post('string'), array('placeholder' => 'Enter your text here', 'class' => 'input-xxlarge', 'style'=>'height:150px;')); ?>
	<p><?php echo Form::submit('submit', 'Reverse', array('class' => 'btn')); ?></p>
<?php echo Form::close(); ?>

<?php if(!empty($calculated)): ?>
<div class="well">
	<div class="code"><?=$calculated?></div>
</div>
<?php endif; ?>