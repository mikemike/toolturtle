<p>
	The SHA1 algorithm is a widely used hash function, created by the United States
    National Security Agency (NSA).  SHA standards for Secure Hash Algorithm.
</p>

<?php echo $val->show_errors(); ?>

<?php echo Form::open(); ?>
	<div class="input-append">
		<?php echo Form::input('string', '', array('placeholder' => 'Enter your string here', 'class' => 'input-xxlarge')); ?>
		<?php echo Form::submit('submit', 'Hash', array('class' => 'btn')); ?>
    </div>
<?php echo Form::close(); ?>

<?php if(!empty($hashed)): ?>
<div class="well">
	<div class="code"><?=$hashed?></div>
</div>
<?php endif; ?>