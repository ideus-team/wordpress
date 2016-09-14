function loadMore(){
  var button = $('.js-posts__more');
  var content = button.closest('.js-posts').find('.js-posts__content');

  button.on('click', function(e){
    e.preventDefault();

    button = $(this);
    var offset = button.data('offset');
    var count  = button.data('count');

    $.ajax({
      type: 'POST',
      url: ncVar.ajaxurl,
      data: {
        'count'  : count,
        'offset' : offset,
        'action' : 'loadMore',
      },
      dataType: 'json',
      success: function(result){
        content.append(result.content);

        if (result.offset < result.found) {
          button.data('offset', result.offset);
        } else {
          button.remove();
        }
      }
    });
  });
}
