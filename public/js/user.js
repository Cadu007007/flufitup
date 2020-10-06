var collapseAnimationDuration = 200;

immediateCollapse();

$(document).ready(function() {
    if (localStorage.getItem('collapsed_sidebar') == null) {
        localStorage.setItem('collapsed_sidebar', '0')
    } else {
        if (localStorage.getItem('collapsed_sidebar') == '1') {
            collapseSidebar();
        } else {
            expandSidebar();
        }
    }
    setTimeout(() => {
        $('.collapse-sidebar').addClass('opacity-1')
        $('.expand-sidebar').addClass('opacity-1')
    }, 200);
})

/* Sidebar */
var intInitialSidebarWidth = 215;
var intSmallWidth = 103;

/* Collapse  */
//$('.collapse-sidebar').click(function() {
$('.collapse-sidebar').click(function() {
    collapseSidebar();
    /* change value is local storage */
    localStorage.setItem('collapsed_sidebar', '1')
});

/* Expand */
$('.expand-sidebar').click(function() {
    expandSidebar();

    /* change value is local storage */
    localStorage.setItem('collapsed_sidebar', '0')
});


function collapseSidebar() {

    $(".Sidebar").animate({
        width: `${intSmallWidth}px`,
    }, collapseAnimationDuration);

    $(".Sidebar-container").animate({
        width: `${intSmallWidth}px`,
    }, collapseAnimationDuration);


    setTimeout(() => {
        $('.expand-sidebar').removeClass('hidden')
        $('.collapse-sidebar').addClass('hidden')
    }, collapseAnimationDuration);


    setTimeout(() => {

        /* hide sidebar text */
        $('.Sidebar .item-title').addClass('hidden');

        /* update app with */
        $('#app').css('grid-template-columns', `${intSmallWidth}px auto`)

        $('.PageContentContainer').css('padding', '0 120px 0 80px !important')

    }, collapseAnimationDuration - 50);



}


function expandSidebar() {


    $(".Sidebar").animate({
        width: `${intInitialSidebarWidth}px`,
    }, collapseAnimationDuration);

    $(".Sidebar-container").animate({
        width: `${intInitialSidebarWidth}px`,
    }, collapseAnimationDuration);


    /* change arrow */

    setTimeout(() => {
        $('.collapse-sidebar').removeClass('hidden')
        $('.expand-sidebar').addClass('hidden')
    }, collapseAnimationDuration);

    setTimeout(() => {

        /* hide sidebar text */
        $('.Sidebar .item-title').removeClass('hidden');

        /* update app with */
        $('#app').css('grid-template-columns', `${intInitialSidebarWidth}px auto`)

        $('.PageContentContainer').css('padding', '0 139px 0 16px !important')

    }, collapseAnimationDuration - 50);


}






function immediateCollapse() {

    $(".Sidebar").css('width', intSmallWidth)
    $(".Sidebar-container").css('width', intSmallWidth)


    $('.expand-sidebar').removeClass('hidden')
    $('.collapse-sidebar').addClass('hidden')


    /* hide sidebar text */
    $('.Sidebar .item-title').addClass('hidden');

    /* update app with */
    $('#app').css('grid-template-columns', `${intSmallWidth}px auto`)

    $('.PageContentContainer').css('padding', '0 120px 0 80px !important')

}


/* XX Sidebar XX */



/* CREATE PACKAGE CALENDAR BUTTON FIX */
$('.cd-body-wrapper header button').prop("type", "button")

/* XX CREATE PACKAGE CALENDAR BUTTON FIX XX */




/* CHAT */

$(document).ready(function() {
    try {
        // check if we on the chat page
        if ($("html").find("#Chat")[0].childElementCount) {
            $('body').scrollTop(0)
            $("html").css('overflow', 'hidden')
        }
    } catch {

    }

});

/* Handle CHAT input Auto resizing */

$('#chatMessageInput').keydown(function() {
    checkMessagebox();
})
$('#chatMessageInput').keyup(function() {
    checkMessagebox();
})

/* XX Handle CHAT input Auto resizing XX */


function checkMessagebox() {

    var text = $('#chatMessageInput').val()
    var lines = text.split('\n').length;
    if (lines > 1) {
        var inputHeight = lines * 25
        if (inputHeight > 200) {
            inputHeight = 200
        }
        $('#chatMessageInput').css('height', `${inputHeight}px`);
    } else {
        $('#chatMessageInput').css('height', '40px');
    }

    var newText = text
    for (let index = 0; index < newText.length; index++) {
        if (newText[index] == ' ') {
            newText = newText.replace(newText[index], '')
        }
    }
    for (let index = newText.length; index > 0; index--) {
        if (newText[index] == ' ') {
            newText = newText.replace(newText[index], '')
        }
    }
    updateMessagesContainerStyle()

    if (newText.length == 0) {
        $('#chatMessageInput').val("")
        $('#chatMessageInput').css('height', '40px');
    }

}

function updateMessagesContainerStyle() {
    // calculate messages-container new height
    // navbar
    var navbarHeight = $('.header-container').css('height').replace('px', '')
    var pageHeaderHeight = $('.page-header').css('height').replace('px', '')
    var messageBoxHeight = $('.message-box').css('height').replace('px', '')

    var totalHeights = Number(navbarHeight) + Number(pageHeaderHeight) + Number(messageBoxHeight)
    $('.messages-container').css('height', `calc(100vh - ${totalHeights}px`)

    // get total messages height
    var messagesHeights = 0
    $('.MessageContainer').each(function(index, element) {
        messagesHeights = messagesHeights + element.offsetHeight
    })
    if (messagesHeights > (500 - pageHeaderHeight)) {
        $('.messages-container').css('display', 'block')
    }

    var messagesContainerWidth = $('.messages-container').css('width').replace('px', '')
    var logoWidth = $('.MessageContainer .image').css('width').replace('px', '')
    var logoLeftMargin = $('.MessageContainer .image').css('margin-left').replace('px', '')
    var logoRightMargin = $('.MessageContainer .image').css('margin-right').replace('px', '')

    var maximumMessageWidth = Number(messagesContainerWidth) - Number(logoWidth) - Number(logoLeftMargin) - Number(logoRightMargin) - 40 // .MessageContainer side margins

    // check messsages width
    $('.message').each(function(index, element) {
        if (element.offsetWidth > maximumMessageWidth) {
            $(this).css('width', `${maximumMessageWidth}px`)
        }
        // check width
    })
}

$('#Chat').css('overflow', 'hidden !important')

/* CHAT */