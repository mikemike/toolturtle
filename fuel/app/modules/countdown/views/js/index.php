    <?php echo Asset::js('jquery.countdown.js'); ?>
    <script type="text/javascript">
      $(function(){
      	$('#go').click(function(){
      		$('#finished').hide();
      		$('#counter').html('');
			$('#counterCont').show();
      		$('#counter').countdown({
	          image: '<?php echo Uri::base(); ?>assets/img/digits.png',
	          startTime: strpad($('#hours').val()) + ':' + strpad($('#minutes').val()) + ':' + strpad($('#seconds').val()),
	          timerEnd: function(){ $('#finished').show(); },
	          format: 'hh:mm:ss'
	        });
      	});


        $('#goTime').click(function(){
          $('#finished').hide();
          $('#counter').html('');

          var currentDate = new Date();

          var dateString = (currentDate.getFullYear() +'-'+ strpad(currentDate.getMonth()+1)+'-'+strpad(currentDate.getDate())+' '+ $('#starttime').val() +':00');
		  var curDateString = (currentDate.getFullYear() +'-'+ strpad(currentDate.getMonth()+1)+'-'+strpad(currentDate.getDate())+ ' '+ strpad(currentDate.getHours()) +':'+ strpad(currentDate.getMinutes()) +':'+ strpad(currentDate.getSeconds()) );
         
		  var time1 = new Date(dateString).getTime();
          var time2 = new Date(curDateString).getTime();
          
		  if(time1 < time2){
			alert('Please make sure you select a time in the future!');  
		  } else {
		  
			  $('#counterCont').show();
			  
			  var diff = time1 - time2;
			  var totalSec = diff / 1000;
			  hours = parseInt( totalSec / 3600 ) % 24;
			  minutes = parseInt( totalSec / 60 ) % 60;
			  seconds = totalSec % 60;
	
			  result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);
		
			  $('#counter').countdown({
				image: '<?php echo Uri::base(); ?>assets/img/digits.png',
				startTime: result,
				timerEnd: function(){ $('#finished').show(); },
				format: 'hh:mm:ss'
			  });
			  
		  }
        });
		
		
        dateNow = new Date();
		
        $('.timepicker').timepicker({
          showSecond: true,
		  //minDate: new Date(dateNow.getFullYear(), dateNow.getMonth(), dateNow.getDay(), dateNow.getHours(), dateNow.getMinutes()),
        });
      });
      function strpad(val){ 
		  return (!isNaN(val) && val.toString().length==1)?"0"+val:val; 
      }

    </script>

    <style type="text/css">
      br { clear: both; }
      .cntSeparator {
        font-size: 54px;
        margin: 10px 7px;
        color: #000;
      }
      .desc { margin: 7px 3px; }
      .desc div {
        float: left;
        font-family: Arial;
        width: 70px;
        margin-right: 65px;
        font-size: 13px;
        font-weight: bold;
        color: #000;
      }
    </style>