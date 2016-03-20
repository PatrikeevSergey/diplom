jQuery.fn.ttabs = function(options){
var options = jQuery.extend({
activeClass: 'active-ttab' // Класс активной вкладки
},options);
return this.each(function() {
$(this).find('.tt-panel:first').show(0);
$(this).find('.index-tabs span:first').addClass(options.activeClass);
$(this).find('.index-tabs span').click(
function() {
$(this).parent().parent().find('.index-panel .tt-panel').hide(0);
var numEl= $(this).index();
$(this).parent().parent().find('.index-panel .tt-panel').eq(numEl).show();
$(this).parent().find('span').removeClass(options.activeClass);
$(this).addClass(options.activeClass);
}
);
});
};
$(document).ready(function() {
$('.tt-tabs').ttabs();
$('.tt-tabs2').ttabs();
});

