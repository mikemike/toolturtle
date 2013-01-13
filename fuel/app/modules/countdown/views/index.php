<p>
	Countdown from a specified time.
</p>

  <form class="form-horizontal">
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

    <div class="form-actions">
      <button type="button" class="btn" id="go">Go</button>
    </div>
  </form>

  <div class="hide alert alert-success" id="finished">
    <strong>Woop!</strong> All finished!
  </div>

  <div id="counter"></div>