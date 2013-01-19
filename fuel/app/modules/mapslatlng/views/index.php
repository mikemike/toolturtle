<h1>Maps Lat,Lng Tool</h1>

<p>
	Use this tool to grab the latitude and longitude of a specific
	location on a map.
</p>

<div class="row">
	<div class="span6">
		<div class="well form-horizontal">

			<div class="input-append">
				<input id="gadres" type="text" size="24" value="The Statue of Liberty" /> 
				<input type="button" value="Find" class="btn" title="Find Lat & Long" onclick="codeAddress();" /> 
			</div>

			<p>Search place name or click on map to get lat long coordinates.</p>

			<div class="control-group">
				<label class="control-label">Latitude:</label>
				<div class="controls">
					<input type="text" name="lat" id="lat" />
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Longitude:</label>
				<div class="controls">
					<input type="text" name="lng" id="lng" />
				</div>
			</div>

		</div> <!-- .well -->

	</div> <!-- .span6 -->
	<div class="span6">

		<div class="well form-horizontal">

			<h3>Map Mouse Over Lat &amp; Long</h3>
			
			<div class="control-group">
				<label class="control-label">Lat:</label>
				<div class="controls">
					<input type="text" name="mlat" id="mlat" value="0" />
				</div>
			</div>
				
			<div class="control-group">
				<label class="control-label">Long:</label>
				<div class="controls">
					<input type="text" name="mlong" id="mlong" value="0" />
				</div>
			</div>

		</div> <!-- .well -->

	</div> <!-- .span6 -->
</div> <!-- .row -->

<div class="row">
	<div id="latlongmap" class="span12"></div>
</div>