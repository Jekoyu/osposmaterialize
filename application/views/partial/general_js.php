<script type="text/javascript">
	"use strict"
	function currencyFormat(elm){
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

</script>