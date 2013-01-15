    <script type="text/javascript">
      $(function(){
		// Convert to uppercase
      	$('#upper').click(function(){
      		text = $('#text').val();
			
			text = text.toUpperCase();
			$('#text').val(text);
      	});
		
		// Convert to lowercase
      	$('#lower').click(function(){
      		text = $('#text').val();
			
			text = text.toLowerCase();
			$('#text').val(text);
      	});
		
		// Convert first letter of sentences to uppercase
      	$('#sentence').click(function(){
      		text = $('#text').val();
			
			text = capitalizeSentences(text);
			$('#text').val(text);
      	});
		
		// Convert first letter to uppercase
      	$('#ucfirst').click(function(){
      		text = $('#text').val();
			
			text = ucfirstAll(text);
			$('#text').val(text);
      	});
		
		// Convert to CrAzY cAsE
      	$('#crazy').click(function(){
      		text = $('#text').val();
			
			text = crazyCase(text);
			$('#text').val(text);
      	});
	  });
	  
	  // proper case function (JScript 5.5+)
  	  function ucfirstAll(s)
	  {
	    return s.toLowerCase().replace(/^(.)|\s(.)/g, 
			  function($1) { return $1.toUpperCase(); });
	  }
	  
	  // Capitalise sentences 
	  function capitalizeSentences(text){

		var capText = text;
		
		capText = capText.replace(/\.\n/g,".[-<br>-]. ");
		capText = capText.replace(/\.\s\n/g,". [-<br>-]. ");
		var wordSplit = '. ';		
		
		var wordArray = capText.split(wordSplit);
		
		var numWords = wordArray.length;
		
		for(x=0;x<numWords;x++) {
		
			wordArray[x] = wordArray[x].replace(wordArray[x].charAt(0),wordArray[x].charAt(0).toUpperCase());
						
			if(x==0) {
				capText = wordArray[x]+". ";
			}else if(x != numWords -1){
				capText = capText+wordArray[x]+". ";
			}else if(x == numWords -1){
				capText = capText+wordArray[x];
			}		
			
		}
		
		capText = capText.replace(/\[-<br>-\]\.\s/g,"\n");		
		
		capText = capText.replace(/\si\s/g," I ");      	
		return capText;
		
	  }
	  
	  // ChAnGe ThIs 
	  function crazyCase(text){
		
		var letterArray = text.split('');
		
		var numWords = letterArray.length;
		
		upper = true;
		
		newtext = '';
		
		for(x=0;x<numWords;x++) {
					
			if(upper==true){
				newtext = newtext + (letterArray[x].toUpperCase());
				upper = false;
			} else {
				newtext = newtext + (letterArray[x].toLowerCase());								
				upper = true;
			}			
			
		}     	
		return newtext;
		
	  }
    </script>
