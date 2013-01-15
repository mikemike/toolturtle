<h1>Countdown Timer</h1>

<p>
	Countdown from a specified time.
</p>

<div class="row">
  <div class="span6">
    <form class="form-horizontal">
      <div class="fixed-height-150">
          <div class="control-group">
            <label class="control-label" for="hours">Hours</label>
            <div class="controls">
              <input type="text" id="hours" placeholder="hours" value="0" class="input-mini">
            </div>
          </div>
    
          <div class="control-group">
            <label class="control-label" for="minutes">Minutes</label>
            <div class="controls">
              <input type="text" id="minutes" placeholder="minutes" value="0" class="input-mini">
            </div>
          </div>
    
          <div class="control-group">
            <label class="control-label" for="seconds">Seconds</label>
            <div class="controls">
              <input type="text" id="seconds" placeholder="seconds" value="0" class="input-mini">
            </div>
          </div>
      </div> <!-- .fix-height-150 -->
    
      <div class="form-actions">
        <button type="button" class="btn" id="go">Go</button>
      </div>          
    </form>
  </div> <!-- .span6 -->
  
  <div class="span6">
    <form class="form-horizontal">
      <div class="fixed-height-150">
          <div class="control-group">
            <label class="control-label" for="starttime">Start Time</label>
            <div class="controls">
              <input type="text" id="starttime" placeholder="Time" class="timepicker">
              <p class="help-block">Please enter a time in the future</p>
            </div>
          </div>
	  </div> <!-- .fix-height-150 -->

      <div class="form-actions">
        <button type="button" class="btn" id="goTime">Go</button>
      </div>
    </form>
  </div> <!-- .span6 -->
</div> <!-- .row -->


<div class="hide alert alert-success" id="finished">
	<strong>Woop!</strong> All finished!
</div> <!-- #finished -->

<div class="center">
	<div id="counterCont" class="hide well">
		<div id="counter"></div>
    </div>
</div> <!-- .center -->