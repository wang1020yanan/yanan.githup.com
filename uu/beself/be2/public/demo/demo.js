var isPanelOpended = true;
var switcher = '<div id="style-switcher"><div id="toggle-button"></div>';
switcher += '<h3 class="demo">Template Colors</h3>';
switcher += '<ul class="color-list">';
switcher += '<li><a id="default" href="javascript:;">Default (Black)</a></li>';
switcher += '<li><a id="blue" href="javascript:;">Blue</a></li>';
switcher += '<li><a id="red" href="javascript:;">Red</a></li>';
switcher += '<li><a id="green" href="javascript:;">Green</a></li>';
switcher += '<li><a id="brown" href="javascript:;">Brown</a></li>';
switcher += '</ul>';
switcher += '<p class="note">You can choose the color that perfectly matches with your business.</p>'
switcher += '</div>';
$('body').append(switcher);
$('#toggle-button').click(function() {
    if (isPanelOpended) {
        isPanelOpended = false;
        $('#style-switcher').stop().animate({
            left : '-165px'
        }, 1800, 'easeOutQuint')
    } else {
        isPanelOpended = true;
        $('#style-switcher').stop().animate({
            left : '0'
        }, 1000, 'easeOutQuint')
    }
});
$('ul.color-list a').click(function() {
    var path = window.location.pathname;
    var link = 'css/colors/' + $(this).attr('id') + '.css';
    if (path.indexOf('elements/') > 0) {
        link = '../css/colors/' + $(this).attr('id') + '.css';
    }
    if ($('#template-color').length > 0) {
        if ($(this).attr('id') != 'default') {
            $('#template-color').attr('href', link);
        } else {
            $('#template-color').remove();
        }
    } else {
        if ($(this).attr('id') != 'default') {
            $('head').append('<link id="template-color" rel="stylesheet" href="' + link + '" />');
        }
    }
});
