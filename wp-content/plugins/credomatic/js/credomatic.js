$( document ).ready(function() {    
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
	  validartarjeta();
	});


	function validartarjeta(){
		if ($("#tarjeta").val() != ""){
			v = luhnCheck($("#tarjeta").val());
			console.log(v);
			if (!v){
				showerror("#tarjeta","Número de tarjeta no válido");
				return false;
			}
		}else {
			showerror("#tarjeta","Número de tarjeta es un campo requerido");
			return false;
		}
		showok("#tarjeta");
		return true;
	}

	function validarcvv () {
		if ($("#cvv").val() != ""){
    		showok("#cvv");
    	}else {
    		showerror("#cvv","Cvv es un campo requerido");
    	}
	}

	function validarselects(){
		var campos = "";
		var valid  = true;

		if ($("#mes").val() == null) {
			campos = "- Mes ";
			valid  = false;
			showerror("#mesano","Mes es un campo requerido");
		} else {
			showok("#mesano");
		}
		if ($("#ano").val() == null) 
		{
			campos += "- Año ";
			valid  = false;			
		} else {
			showok("#mesano");
		}

		if (!valid){
			showerror("#mesano",campos+" campo requerido(s)");
		}else {
			showok("#mesano");
		}


	}

	$("#credomatic_input select").on('change', function() {
	  	validarselects();
	});

	function showerror(field,descripcion){
		//$(field).css("border","2px solid red");
		$(field+"error").html(descripcion);
	}

	function showok(field){
		//$(field).css("border","2px solid green");
		$(field+"error").html("");
	}

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

    $('#cvv').on('keyup', function(e) {
    	if ($("#cvv").val().length < 3 ){
    		showerror("#cvv","Número de dígitos inválido");
    	}else {
    		showok("#cvv");
    	}

        validateMaxLength();
    });


	function validateMaxLength()
	{
		

	        var text = $("#cvv").val();
	        
	        var maxlength = $("#cvv").attr('maxlength');

	        if(maxlength > 0)  
	        {
	                $("#cvv").val(text.substr(0, maxlength)); 
	        }
	}

    function validarform(){    	
    	validartarjeta();
    	validarcvv();
    	validarselects();
    }

    $('form[name="checkout"]').submit(function(e) {
    	/* Check credomatic option */
    	if ($("input[name='payment_method']:checked").val() == "credomatic"){
	    	validarform();
	    	e.preventDefault();	  
		  	return false;
	  } 
	});

	 $("input[name='payment_method']").change(function(e) {
    	/* Check credomatic option */
    	if (this.value == 'credomatic') { 
    		 $("#credomatic_input").show(); 
    	}else{
    		$("#credomatic_input").hide();
    	}
	});


});
