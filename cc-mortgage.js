var $J = jQuery.noConflict();


$J( document ).ready(function() {
	// runtime events
	
	$J(".mortgage").keydown(function(event) {
		if(!(isIntegerKey(event))) event.preventDefault();
		
	});	

	$J(".mortgage-term").keydown(function(event) {
		if(!(isIntegerKey(event))) event.preventDefault();
		
	});	

	$J(".mortgage-rate").keydown(function(event) {
		if(!(isDecimalKey(event,$J("#" + $J(this).closest("aside").attr("id") + "-mortgage-rate").val()))) event.preventDefault();
		
	});	
	
	$J(".mortgage").keyup(function( ) {
		calculate_mortgage($J(this).closest("aside").attr("id"));
	});
	$J(".mortgage-term").keyup(function( ) {
		calculate_mortgage($J(this).closest("aside").attr("id"));
	});
	$J(".mortgage-rate").keyup(function( ) {
		calculate_mortgage($J(this).closest("aside").attr("id"));
	});

});

function format_id(id,name)
{
    
};

function calculate_mortgage(id)
{
    var mortgage_id = '#' + id + '-' + 'mortgage';
	var mortgage = $J(mortgage_id).val(),
		term = $J('#' + id + '-' + 'mortgage-term').val(),
		rate = $J('#' + id + '-' + 'mortgage-rate').val();
	
	// if no data entered
	if (isNaN(mortgage) || mortgage == "") return;
	if (isNaN(term) || term == "") return;
	if (isNaN(rate) || rate == "") return;
	
	
	var monthlyRate = (rate/12)/100,
		paymentsNumber = term * 12,
		monthlyPayment = 0,
		totalPayment = 0,
		interestPaid = 0;
		
	monthlyPayment = round2TwoDecimals((monthlyRate * mortgage * Math.pow(1 + monthlyRate, paymentsNumber)) / (Math.pow(1 + monthlyRate, paymentsNumber) - 1));
	totalPayment = round2TwoDecimals(monthlyPayment * paymentsNumber);
	interestPaid = round2TwoDecimals(totalPayment - mortgage);
	
	$J('#' + id + '-' + 'monthlyPayment').html(monthlyPayment);
	$J('#' + id + '-' + 'totalPayment').html(totalPayment);
	$J('#' + id + '-' + 'interestPaid').html(interestPaid);
	//id = $J(this).closest("aside").attr("id");
    //$J('#' + id + '-' + 'interestPaid').html(id);
	   
};


function isIntegerKey(evt)	  
      {
         var key = evt.which || evt.which || event.keyCode;
		 // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
		 var isInteger = (key == 8 || 
                key == 9 ||
                key == 46 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
		return isInteger;
				
      };
	  
function isDecimalKey(e, number)
      {
         var key = (e.which) ? e.which : e.keyCode;
		 // numbers (48-57 and 96-105), dot (110,190), comma (44,188), backspace(8), tab (9), navigation keys (35-40), DEL(46)
		 if ((key >= 48 && key <= 57) || (key >= 96 && key <= 105) || key == 110 || key == 190 || key == 8 || key == 9 || (35 <= key && key <= 40) || key == 46 )  
		 	{
			 		  if (key == 110 || key == 190)
					  {
					   	 // skip it if comma or decimal point already entered or it is empty field yet
						 if (number.indexOf(".") > -1 || number.indexOf(",") > -1 || number.length == 0) 
						 	return false; 
					  }
			          return true;
			}

         return false;
      };

function radioValue(element)	  
		 {
		    var returnValue = "";
            var radios = document.getElementsByName(element);
            
            for (var i = 0, length = radios.length; i < length; i++) {
                if (radios[i].checked) {
                    returnValue = radios[i].value;
                }
			}
			return returnValue;	
		 };	  	
function round2TwoDecimals(number)
		 {
 		    return Math.round(number*100)/100						 
		 };	
 



