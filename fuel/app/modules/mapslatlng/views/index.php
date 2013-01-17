<h1>Maps Lat,Lng Tool</h1>

<p>
	Use this tool to grab the latitude and longitude of a specific
	location on a map.
</p>


<div id="map_container">
	<div id="map_canvas" style="height: 600px; border: #663300 1px solid; margin-right:170px;"></div>
</div><!--close:id=map_container-->
<div id="map_canvas_resize_container">
	<div id="map_canvas_increase" onclick="change_map_height(100)"></div>
	<div id="map_canvas_decrease" onclick="change_map_height(-100)"></div>
</div><!--close:id=map_canvas_resize_container-->


<div class="info_block">
	<form name="load_location" method="get" class="forms" action="">
		<h4>Load Location</h4>
		<div class="row"><span id="load_lat_span"><span class="label">Latitude:</span><span class="value"><input class="text" type="text" onfocus="set_focus(this, true)" onblur="set_focus(this, false)" name="lat" maxlength="50" /></span></span></div>
		<div class="row"><span id="load_lon_span"><span class="label">Longitude:</span><span class="value"><input class="text" type="text" onfocus="set_focus(this, true)" onblur="set_focus(this, false)" name="lon" maxlength="50" /> <input type="image" src="../images/load-button.png" name="load_latlon_button" id="load_latlon_button" onclick="dispatch_main_form(); return false;" alt="load latitude and longitude" title="load latitude and longitude" /></span></span></div>
		<div class="row"><span id="load_address_span"><span class="label">Location:</span><span class="value">
			<input class="text" type="text" onfocus="set_focus(this, true)" onblur="set_focus(this, false)" name="address" maxlength="50" /> <input type="image" src="../images/load-button.png" name="load_address_button" id="load_address_button" onclick="load_address(document.load_location.address.value); return false;" alt="load location" title="load location" /></span></span></div>
			<div class="row"><span id="load_zipcode_span"><span class="label">Post Code:</span><span class="value"><input class="text" type="text" onfocus="set_focus(this, true)" onblur="set_focus(this, false)" name="zipcode" maxlength="10" /> <input type="image" src="../images/load-button.png" name="load_zipcode_button" id="load_zipcode_button" onclick="load_zipcode(document.load_location.zipcode.value); return false;" alt="load postal code" title="load postal code" /></span></span></div>
			<div class="row"><span id="load_rep"></span></div>
			<input type="hidden" name="sescod" value="1629335" />
		</form>
	</div>

	<div class="info_block">
		<h4 style="display:inline">Map Coordinates</h4> of Selected Location<br />
		<div class="row"><span id="lat_HMS"><span class="label">Latitude:</span><span class="value redbrown">38&deg;&nbsp;16&#39;&nbsp;21.6787&quot;</span></span></div>
		<div class="row"><span id="lon_HMS"><span class="label">Longitude:</span><span class="value redbrown">-89&deg;&nbsp;1&#39;&nbsp;59.5313&quot;</span></span></div>
		<div class="row"><span id="lat_DMD"><span class="label">Latitude:</span><span class="value olive">N 38&deg;&nbsp;16.361312158858&#39;&nbsp;</span></span></div>
		<div class="row"><span id="lon_DMD"><span class="label">Longitude:</span><span class="value olive">W 89&deg;&nbsp;1.9921875&#39;&nbsp;</span></span></div>
		<div class="row"><span id="lat_dec"><span class="label">Latitude:</span><span class="value">38.27268853598097&deg;</span></span></div>
		<div class="row"><span id="lon_dec"><span class="label">Longitude:</span><span class="value">-89.033203125&deg;</span></span></div>
	</div>

	<div class="info_block">
		<h4 style="display:inline">Selected Location</h4> (Approximate)<br />
		<div class="row"><span id="address"><span class="label">Address:</span><span class="value"></span></span></div>
		<div class="row"><span id="lat_address"><span class="label">Latitude:</span><span class="value"></span></span></div>
		<div class="row"><span id="lon_address"><span class="label">Longitude:</span><span class="value"></span></span></div>
		<div class="row"><span id="accuracy"><span class="label">Accuracy:</span><span class="value"></span></span></div>
		<div class="row"><span id="status_code"><span class="label">Status:</span><span class="value"></span></span></div>
	</div>

	<div class="info_block">
		<h4 style="display:inline">Map Coordinates</h4> of Mouse<br />
		<div class="row"><span id="dyn_lat_HMS"><span class="label">Latitude:</span><span class="value">mouse off map</span></span></div>
		<div class="row"><span id="dyn_lon_HMS"><span class="label">Longitude:</span><span class="value">mouse off map</span></span></div>
		<div class="row"><span id="dyn_lat_DMD"><span class="label">Latitude:</span><span class="value"></span></span></div>
		<div class="row"><span id="dyn_lon_DMD"><span class="label">Longitude:</span><span class="value"></span></span></div>
		<div class="row"><span id="dyn_lat"><span class="label">Latitude:</span><span class="value"></span></span></div>
		<div class="row"><span id="dyn_lon"><span class="label">Longitude:</span><span class="value"></span></span></div>
	</div>

	<div class="info_block">
		<h4>Map Parameters</h4>
		<div class="row"><span id="zoom_display"><span class="label">zoom:</span><span class="value">4</span></span></div>
		<div class="row"><span id="map_type_span"><span class="label">map type:</span><span class="value">G_NORMAL_MAP</span></span></div>
		<div class="row"><span id="dimensions_span"><span class="label" title="Map Dimensions">Dims:</span><span class="value" id="map_dims"></span></span></div>
		<div class="row"><span id="empty"><span class="label"></span><span class="value">&nbsp;</span></span></div>
		<div class="row"><span id="reset_map_span"><span class="label">reset map:</span><span class="value"><input type="image" src="../images/reset-16.gif" name="reset_map_button" id="reset_map_button" onclick="reset_map(); return false;" alt="reset map" title="reset map" /></span></span></div>
		<div class="row"><span id="current_link_span"><span class="label">current link:</span><span class="value"></span></span></div>
	</div>

	<script type="text/javascript">
	<!--
	function do_toggle_menu() {
		var menu_el = document.getElementById("menu");
		var el = document.getElementById("menu_expander");
		if (el.className == "menu_opener_closed") {
			el.className = "menu_opener_opened";
			menu_el.className = "info_block_open";
		} else {
			el.className = "menu_opener_closed";
			menu_el.className = "info_block";
		}
	}
//-->
</script>
<div id="menu" class="info_block">
	<h4 style="display:block; float:left; margin-bottom:0px; clear:none;">Menu</h4>
	<span id="menu_expander" class="menu_opener_closed" onclick="do_toggle_menu()"><img src="http://www.findlatitudeandlongitude.com/images/pix.gif" width="13" height="13" alt="expand/contract menu" /></span>
	<div style="display:block; float:left; margin:0px 0px 0px 10px; clear:none;"><!-- AddThis Button BEGIN -->
		<script type="text/javascript">
		var addthis_disable_flash = true;
		var addthis_config = {
			data_track_clickback: true,
			data_track_addressbar: true,
			ui_click: true
		}
		</script>
		<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;username=zwief"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=zwief"></script>
		<!-- AddThis Button END -->
	</div>
	<span style="display:inline; float:right; margin:0px;"><a style="display:inline; margin:0px;" href="http://www.findlatitudeandlongitude.com" title="Convert Latitude and Longitude">Home</a></span>
	<br />

	<div class="row"><span ><a href="http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude.php" title="Reverse geocode, get the nearest address of a latitude-longitude coordinate pair.">Lat/Lng to Address</a> &middot; <a href="http://www.findlatitudeandlongitude.com/find-latitude-and-longitude-from-address.php" title="Address Location Finder: Geocode an address i.e. find the latitude-longitude coordinate pair of an address.">Address to Lat/Lng</a></span></div>

	<div class="row"><span ><a href="http://www.findlatitudeandlongitude.com/batch-geocode/" title="Free Batch Geocode: geocode multiple locations in a single batch.">Batch Geocode</a> &middot; <a href="http://www.findlatitudeandlongitude.com/batch-reverse-geocode/" title="Free Reverse Batch Geocode: reverse geocode multiple latitude-longitude coordinate pairs in a single batch.">Batch Reverse Geocode</a></span></div>

	<div class="row"><span ><a href="http://www.findlatitudeandlongitude.com/searches/" title="Latest searches on the site.">Location Searches</a> &middot; <a href="http://www.findlatitudeandlongitude.com/reverse-geocodes/" title="Reverse geocodes, latest to oldest.">Reverse Geocodes</a></span></div>

	<div class="row"><span style="float:left;"><a href="http://www.findlatitudeandlongitude.com/antipode-map/" title="Tunneling Map AKA Antipode Map">Antipode Map</a> (Tunneling Map)</span></div>

	<div class="row"><span style="float:left;"><a href="http://www.findlatitudeandlongitude.com/gps-coordinates-converter/" title="Convert latitude-longitude coordinates between degrees decimal and various degrees minutes seconds formats.">GPS Coordinates Converter</a></span></div>

	<div class="row"><span title="Give us your constructive input on this site."><a href="&#x6d;&#x61;&#105;&#108;&#116;&#111;&#x3a;&#x77;&#x65;&#98;&#109;&#x61;&#x73;&#116;&#101;&#114;&#64;&#102;&#x69;&#110;&#x64;&#x6c;&#x61;&#x74;&#x69;&#x74;&#x75;&#100;&#101;&#97;&#110;&#x64;&#x6c;&#111;&#x6e;&#103;&#x69;&#x74;&#x75;&#100;&#x65;&#46;&#99;&#x6f;&#109;&#x3f;&#x53;&#x75;&#x62;&#x6a;&#x65;&#99;&#x74;&#61;&#70;&#101;&#101;&#x64;&#x62;&#97;&#99;&#x6b;&#47;&#x53;&#117;&#x67;&#103;&#x65;&#x73;&#116;&#105;&#111;&#110;">&#x46;&#x65;&#101;&#100;&#x62;&#97;&#99;&#x6b;</a> &middot; <a href="http://www.findlatitudeandlongitude.com/click-lat-lng-list/" title="Record multiple latitude-longitude coordinate pairs by clicking in the map.">Record Lat/Longs</a></span></div>

	<div class="row"><span style="float:left;"><a href="http://www.findlatitudeandlongitude.com/search-phrases" title="How you found us.">How You Found Us</a> &middot; <a href="http://www.findlatitudeandlongitude.com/latest-search-phrases" title="Latest Searches">Searches</a></span></div>

</div>
<div class="instruction_block">
	<h4>Instructions</h4>
	<div class="row"><strong>Map Coordinates</strong> displays the latitude and longitude coordinates in degrees, minutes, seconds decimal, degrees minutes decimal and degrees decimal of the current location.</div><br />
	<div class="row"><strong>Selected Location</strong> displays the reverse geocoded location of the current latitude and longitude (approximation only). See also <a href="http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude.php">find address from latitude and longitude</a>.</div>
	<br />
	<div class="row"><strong>Map Coordinates</strong> of mouse displays the latitude and longitude in degrees, minutes, seconds decimal, degrees minutes decimal and degrees decimal of the current mouse location. (See <a href="gps-coordinates-converter/">convert GPS coordinates</a> to convert latitude-longitude coordinate pairs.)</div>
	<br />
	<div class="row"><strong>Load Location</strong>  load a location by coordinates, location name or zip code. Enter the desired value and click the load arrow to the right of the appropriate field. Latitude &amp; longitude  accept degrees decimal, degrees minutes decimal or degrees minutes and seconds decimal.</div>
	<br />
	<div class="row"><strong>Map Parameters</strong> displays current parameters of the map.</div>
	<div class="row"><strong>Map Height</strong> Click the two small, gray triangles just below the map to adjust its height.</div>
</div>
