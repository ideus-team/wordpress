function loadMore() {
  var button = $('.js-loadMore');

  button.on('click', function(e){
    e.preventDefault();

    var button = $(this);
    var container = $( button.data('container') );

    if ( button.hasClass('-disabled_true') ) {
      return false;
    }

    button.addClass('-disabled_true');

    var postdata = {
      'post_type' : button.data('post_type'),
      'offset'    : button.data('offset'),
      'count'     : button.data('count'),
    };

    $.ajax({
      type: 'POST',
      url: nc_params.ajax_url,
      data: {
        'postdata' : postdata,
        'action'   : 'ncLoadMore',
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
