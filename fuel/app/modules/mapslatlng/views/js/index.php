<script type="text/javascript" src="http://www.findlatitudeandlongitude.com/includes/javascript/debugging.js"></script>
<script type="text/javascript" src="http://www.findlatitudeandlongitude.com/includes/javascript/string_funcs.js"></script>
<script type="text/javascript" src="http://www.findlatitudeandlongitude.com/includes/javascript/xmlhttp_init.js"></script>
<script type="text/javascript" src="http://www.findlatitudeandlongitude.com/includes/javascript/num_range.js"></script>
<script type="text/javascript" src="http://www.findlatitudeandlongitude.com/includes/javascript/cookies.js"></script>
<script type="text/javascript">
<!--
	
	function loader() {
		createMap();
		setTimeout("update_dim_display()", 2000);
	}

	function unloader() {
		GUnload();
	}
	
	function set_focus(el, val){
		el.hasFocus=val;	
	}
	
	var lat = 38.27268853598097;
	var lon = -89.033203125;
	var zoom = 4;
	var host = "local.toolturtle.com";
	var self = "http://local.toolturtle.com/";
	var geocoder;
	var address;
	var map;
	var store_geocode = false;
	var debugging = false;
	var iPhone = false;

	$(document).ready(function(){
		loader();
	});
//-->
</script>
<script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=AIzaSyC7QKkiv_WckBcITo8emtMq6ccWSRJA5MM" type="text/javascript"></script>
<script type="text/javascript">
<!--
	var map_type = G_NORMAL_MAP;
//-->
</script>
<script type="text/javascript" src="http://www.findlatitudeandlongitude.com/includes/javascript/coordinate-conversion.js"></script>
<script type="text/javascript" src="http://www.findlatitudeandlongitude.com/includes/javascript/map1.js"></script>
