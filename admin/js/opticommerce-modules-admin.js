(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$(document).ready(function() {
		$(document).on('click', '#opticommerce-module-settings-btn', function(e){
			e.preventDefault();
			opticommerce_settings();
		});

		
	});

	// Perform AJAX
	function opticommerce_settings() {
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajax_object.ajax_url,
			data: { 
				'action': 'ajax_opticommerce_settings',
				'rx_module': $('#rx-module:checkbox:checked').val(),
				'cl_module': $('#cl-module:checkbox:checked').val(),
			},
			beforeSend: function(){
				$('.spinner-btn').show();
				// disabled the submit button
				$("#opticommerce-module-settings-btn").prop("disabled", true);
			},
			success: function(data){
				console.log(data);
				$('.spinner-btn').hide();
				$("#opticommerce-module-settings-btn").prop("disabled", false);
				sessionStorage.status= data.status;
				sessionStorage.message= data.message;
				
				if(data.status == false) {
					$('#accessControl').prepend('<div id="setting_updated_access_control" class="updated settings-error error is-dismissible"><p><strong>' + data.message + '</strong></p></div>');
				}
				location.reload();
			},
			error: function (request, status, error) {
                console.log("Status : ", status);
				console.log("Error : ", error);
				console.log("Request : ", request);
				$("#opticommerce-module-settings-btn").prop("disabled", false);
            }
		});
	};
	$( function () {
		console.log(sessionStorage);
		if ( sessionStorage.status) {
			$('#message p').show();
			$('#message p').append(sessionStorage.message);
			sessionStorage.successMessage = false;
		}
	});
})( jQuery );
