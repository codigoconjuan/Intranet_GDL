
	$(window).ready(function() {
		$('#magazine').turn({
			display: 'double',
			acceleration: true,
			gradients: true,
			autoCenter: true,
			elevation: 50,
			when: {
				turned: function(e, page) {
					/*console.log('Current view: ', $(this).turn('view'));*/
				}
			}
		});

		$('#siguiente').click(function() {
			$("#magazine").turn("next");
		});

		$('#anterior').click(function() {
			$("#magazine").turn("previous");
		});

	});

			document.querySelector( '.magazine-viewport' ).addEventListener( 'click', function( event ) {
				event.preventDefault();
				zoom.to({ element: event.target });
			} );
