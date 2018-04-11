var HEADER_FADE_DELAY = 200;
var NAV_SCROLL_HEIGHT = 90;

var header;
var headerFollowing = false;

//On document loaded
$(document).ready(function() {
    header = $("#main-header");
    header.addClass("locked");
    
    $("#video-button").YouTubePopup({ youtubeId: 'P7RqewA5KWM', title: 'Beat It', clickOutsideClose: true, showBorder: false});
});

//On scrolling
$(window).scroll(function() {
    //Show header instantly if scrolled right to the top
    if (window.scrollY == 0)
    {
        headerFollowing = false;
        header.stop(true);
        header.addClass("locked");
        header.css({"top" : "0px"});
        header.fadeIn(0);
    }
    else
    {
        //Switch header between top of page and top of screen based on scrolling
        var shouldFollow = window.scrollY > NAV_SCROLL_HEIGHT;
        if (shouldFollow && !headerFollowing)
        {
            headerFollowing = true;
            header.removeClass("locked");
            header.css({"top" : "-45px"});
            header.animate({"top" : 0}, HEADER_FADE_DELAY)
        }
        else if (headerFollowing && !shouldFollow)
        {
            headerFollowing = false;
            header.animate({"top" : "-45px"}, HEADER_FADE_DELAY, function() {
                header.addClass("locked");
                header.css({"top" : "0px"});
            });
        }
    }
});