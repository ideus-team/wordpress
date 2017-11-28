function loadMore() {
  var button = $('.js-loadMore');

  button.on('click', function(e){
    e.preventDefault();

    var button = $(this);
    var container = $( button.data('container') );

    var postdata = {
      'post_type' : button.data('post_type'),
      'offset'    : button.data('offset'),
      'count'     : button.data('count'),
    };

    $.ajax({
      type: 'POST',
      url: ncVar.ajaxurl,
      data: {
        'postdata' : postdata,
        'action'   : 'ncLoadMore',
      },
      dataType: 'json',
      success: function(result){
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
