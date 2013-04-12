(function( $ ) {
	$(function() {
		$(window).hashchange( function() {
			var hash = location.hash;
			hash = hash.substring( 1 );

			if ( hash.match( /^([a-z0-9\-]+\.)+([a-z0-9]+)/i ) ) {
				console.log( hash );

				window.location = 'http://' + hash;
			} else {
				$('#search').find('input[type="search"]').val( hash );
				$('#search').submit();
			}//end else
		});
	});
})( jQuery );
