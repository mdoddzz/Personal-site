
function setCookie(key, value) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}

$(document).on('click', '.toggle', function(){

    if($(this).hasClass('active')){
            
        setCookie("darkTheme", 0);
        $('body').removeClass('night');
        $(this).removeClass('active');

    } else {

        setCookie("darkTheme", 1);
        $('body').addClass('night');
        $(this).addClass('active');

    }

});

// Animated input handler
$('.animatedInput textarea, .animatedInput input').change( function(){

    if($(this).val()) {
        $(this).parents('.animatedInput').addClass('hasContent');
    } else {
        $(this).parents('.animatedInput').removeClass('hasContent');
    }

});