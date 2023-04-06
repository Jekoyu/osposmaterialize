<script type="text/javascript">
	"use strict"
	function currencyFormat_(elm){
		// skip for arrow keys
		if(event.which >= 37 && event.which <= 40){
			event.preventDefault();
		}

		$(elm).val(function(index, value) {
			return value
			.replace(/\D/g, "")
			// .replace(/([0-9])([0-9]{2})$/, '$1,$2')  
			.replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".")
			;
		});
	}

	/*$(document).on('change click keyup input paste', 'input.auto-currency', function() {
	    $(this).val(function(index, value) {
	        var sign = value.charAt(0),
	        $return = 0;
	        // $return = value.replace(/(?!\.)\D/g, "").replace(/(?:\..*)\./g, "").replace(/\.(\d\d)\d?$/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	        $return = value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
	        if (sign == '-')
	        {
	            $return = '-'+$return;
	        }

	        return $return;
	    });
	});*/

	$(document).on('change click paste', 'input.auto-currency', function() {
	    $(this).val(function(index, value) {
	        if(value !== "") return accounting.formatMoney(accounting.unformat(value, ","), "", 2, ".", ",");
	        else return;
	    });
	});


</script>