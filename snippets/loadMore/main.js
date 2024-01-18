/**
 * Load More
 */
function initLoadMore() {
	const button = $('.js-loadMore');

	button.on('click', function(e){
		e.preventDefault();

		const button    = $(this);
		const container = $( button.data('container') );

		if ( button.hasClass('-disabled_true') ) {
			return false;
		}

		button.addClass('-disabled_true');

		let postdata = {
			'post_type' : button.data('post_type'),
			'category'  : button.data('category'),
			'orderby'   : button.data('orderby'),
			'order'     : button.data('order'),
			'offset'    : button.data('offset'),
			'count'     : button.data('count'),
			'template'  : button.data('template'),
		};

		$.ajax({
			type: 'POST',
			url: nc_params.ajax_url,
			data: {
				'postdata' : postdata,
				'action'   : 'nc_load_more',
			},
			dataType: 'json',
			success: function(result){
				button.removeClass('-disabled_true');

				if ( result.success == true ) {
					container.append( result.data.content );

					if ( result.data.offset < result.data.total ) {
						button.data( 'offset', result.data.offset );
					} else {
						button.remove();
					}
				}
			}
		});
	});
}


/**
 * Infinite Scroll
 */
function initInfiniteScroll() {
	const button = $('.js-loadMore.-infinite_true');
	let offset, wheight, scrolled;

	if ( button.length ) {
		$(window).on('scroll', function() {
			offset   = button.offset().top;
			wheight  = window.innerHeight;
			scrolled = window.scrollY;

			if ( wheight + scrolled >= offset ) {
				button.trigger('click');
			}
		});
	}
}
