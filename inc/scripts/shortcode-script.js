(function($){
$(document).ready(function(){

  /* Fix accordion target */
  $('.accordion').each(function(i){
    var $el = $(this);

    $el.attr('id', 'accordion'+i);
    $el.find('.accordion-heading a').attr('data-parent', '#accordion'+i);
  });

});
})(jQuery);