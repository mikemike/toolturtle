    <?php echo Asset::js('jquery.countdown.js'); ?>
    <script type="text/javascript">
      $(function(){
      	$('#go').click(function(){
      		$('#finished').hide();
      		$('#counter').html('');
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

          var dateString = (strpad(currentDate.getDate()) +'-'+ strpad(currentDate.getMonth()+1)+'-'+currentDate.getFullYear()+' '+ $('#starttime').val());
          alert(dateString);
          var time1 = new Date(dateString).getTime();
          var time2 = new Date().getTime();
         
          var diff = new Date(time1 - time2);

          alert(diff);

          var hours = diff.getHours();
          var minutes = diff.getMinutes();
          var seconds = diff.getMinutes();

          alert(hours + ':' + minutes + ':' + seconds);

          $('#counter').countdown({
            image: '<?php echo Uri::base(); ?>assets/img/digits.png',
            startTime: '00:00',
            timerEnd: function(){ $('#finished').show(); },
            format: 'hh:mm:ss'
          });
        });

        $('.timepicker').timepicker({
          showSecond: true
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