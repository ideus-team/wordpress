/**
 * Switch Language
 */
function initLangSwitch() {
  if ( $('.js-langSwitch').length ) {
    $('.js-langSwitch__current').on('click', function(){
      let trigger   = $(this);
      let container = trigger.closest('.js-langSwitch');
      let list      = container.find('.js-langSwitch__list');

      container.toggleClass('-state_open');
      list.slideToggle();
    });
  }
}
