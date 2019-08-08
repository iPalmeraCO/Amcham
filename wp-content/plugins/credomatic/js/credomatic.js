$( document ).ready(function() {
    console.log( "ready!" );
    function listyears(){
	var min = new Date().getFullYear();
    max = min + 5;
    select = document.getElementById('ano');

	for (var i = min; i<=max; i++){
	    var opt = document.createElement('option');
	    opt.value = i.toString().substr(-2);
	    opt.innerHTML = i;
	    select.appendChild(opt);
	}

	
	}
	listyears();

	function validateCardNumber(number) {
	    var regex = new RegExp("^[0-9]{16}$");
	    if (!regex.test(number))
	        return false;
	    return luhnCheck(number);
	}

	function luhnCheck(val) {
	    var sum = 0;
	    for (var i = 0; i < val.length; i++) {
	        var intVal = parseInt(val.substr(i, 1));
	        if (i % 2 == 0) {
	            intVal *= 2;
	            if (intVal > 9) {
	                intVal = 1 + (intVal % 10);
	            }
	        }
	        sum += intVal;
	    }
	    return (sum % 10) == 0;
	}

	$( "#tarjeta" ).blur(function() {
	  v = luhnCheck($("#tarjeta").val())
	  console.log(v);
	});

	$('form').on('focus', 'input[type=number]', function(e) {
        $(this).on('wheel', function(e) {
            e.preventDefault();
        });
    });
 
    // Restore scroll on number inputs.
    $('form').on('blur', 'input[type=number]', function(e) {
        $(this).off('wheel');
    });
 
    // Disable up and down keys.
    $('form').on('keydown', 'input[type=number]', function(e) {
        if ( e.which == 38 || e.which == 40 )
            e.preventDefault();
    });
});
