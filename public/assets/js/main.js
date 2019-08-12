
function setCookie(key, value) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}

$(document).ready(function() {

    $('.toggle').click(function(){

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

    //toggle menu
    $(".hamburger-container").click(function() {
        $("#menu").slideToggle();
    });

    //icon animation
    var topBar = $(".hamburger li:nth-child(1)"),
    middleBar = $(".hamburger li:nth-child(2)"),
    bottomBar = $(".hamburger li:nth-child(3)");

    $(".hamburger-container").on("click", function() {
        if (middleBar.hasClass("rot-45deg")) {
            topBar.removeClass("rot45deg");
            middleBar.removeClass("rot-45deg");
            bottomBar.removeClass("hidden");
        } else {
            bottomBar.addClass("hidden");
            topBar.addClass("rot45deg");
            middleBar.addClass("rot-45deg");
        }
    });

});