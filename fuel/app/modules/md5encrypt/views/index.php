<h1>MD5 Encrypt Tool</h1>

<p>
	The MD5 algorithm is a widely used hash function.  It allows you to one-way
    hash a string/value into its MD5 equivalent.
</p>
<p>
	An MD5 hash is usually shown as a hexadecimal number, which is 32 digits long.
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