<h1>Birthday Info</h1>

<p>
	Find out some interesting facts about your birthday,
    such as who shares your birthday or how many days old
    you are.
</p>

<?php echo $val->show_errors(); ?>
<?php if(!empty($error)): ?><div class="alert alert-error"><?= $error ?></div><?php endif; ?>

<?php echo Form::open(array('class' => 'form-horizontal', 'action' => Uri::current().'#results', 'method' => 'get')); ?>
  <div class="control-group">
    <label class="control-label" for="birthday">Your Birthday</label>
    <div class="controls">
      <?php echo Form::input('birthday', \Input::get('birthday'), array('placeholder' => 'Date', 'class' => 'datepicker input-small')); ?>
    </div>
  </div>
  <div class="form-actions">
    <?php echo Form::submit('submit', 'Calculate', array('class' => 'btn')); ?>
  </div>
<?php echo Form::close(); ?>

<a name="results"></a>
<?php if(!empty($birthday_timestamp)): ?>
<div class="well">
  <p>
    Your are roughly <strong><?=$interval['y']?></strong> years, <strong><?=$interval['m']?></strong> months and <strong><?=$interval['d']?></strong> days old.
  </p>
  
  <?php if(!empty($birthdays->result)): ?>
  <hr>

  <h2>Birthdays</h2>
  <p>These famous people (some more famous than others!) all share your birthday!</p>
  <ul>
  <?php foreach($birthdays->result as $birthday): ?>
    <li><?=$birthday->name?></li>
  <?php endforeach; ?>
  </ul>
  <?php endif; ?>

  
  <?php if(!empty($albums->result)): ?>
  <hr>

  <h2>Albums</h2>
  <p>These albums were released on your birthday</p>
  <ul>
  <?php foreach($albums->result as $album): ?>
    <li><?=$album->artist?> - <?=$album->name?></li>
  <?php endforeach; ?>
  </ul>
  <?php endif; ?>

  
  <?php if(!empty($inventions->result)): ?>
  <hr>

  <h2>Inventions</h2>
  <p>All of these things were invented or discovered in the same year as your birthday</p>
  <ul>
  <?php foreach($inventions->result as $invention): ?>
    <li><?=$invention->name?></li>
  <?php endforeach; ?>
  </ul>
  <?php endif; ?>

  
  <?php if(!empty($disasters->result)): ?>
  <hr>

  <h2>Disasters</h2>
  <p>All of these disasters took place in the same year as your birthday</p>
  <ul>
  <?php foreach($disasters->result as $disaster): ?>
    <li><?=$disaster->name?></li>
  <?php endforeach; ?>
  </ul>
  <?php endif; ?>

</div>
<?php endif; ?>