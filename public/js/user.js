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