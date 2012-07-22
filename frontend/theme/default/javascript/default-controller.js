/**
 * Gemaakt door van den Berg Multimedia
 * User: Stef van den Bergt
 * Date: 10-04-12
 * Time: 14:38
 */
var Default = {
    init: function() {
        $('.button').bind('click', function() {
            $('.content').animate({
                height: 515
            }, 500, 'linear')
        });
        $('header').width($(window).width());
        $('.roundabout-moveable-item').css({ opacity: 0.2 });
        $('.roundabout-in-focus').css({ opacity: 1.0 });
        $('header > ul').roundabout({autoplayDuration: 5000, autoplay: true});
    }
}

$(document).ready(function() {
    Default.init();
});