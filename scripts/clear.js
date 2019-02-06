function clearform() {
        	var form = document.getElementById("form");
       		var textFields = form.getElementsByTagName('input');

        	for(var i = 0; i < textFields.length; i++) {
        		if(textFields[i].getAttribute("type") != "hidden" ){
        			textFields[i].setAttribute('value', '');
        		}
            	
        	}
    	}