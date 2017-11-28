$(document).ready(function() {
    // fix menu when passed
    $('#banner')
    .visibility({
        once: false,
        onBottomPassed: function() {
        $('.fixed.menu').transition('fade in');
        },
        onBottomPassedReverse: function() {
        $('.fixed.menu').transition('fade out');
        }
    });

    // create sidebar and attach to menu open
    $('.ui.top.sidebar').sidebar({
        transition: 'push'
    });
    $('.ui.top.sidebar').sidebar('attach events', '.toc.item');
});