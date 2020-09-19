collapseSidebar();

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
})

/* Sidebar */
var intInitialSidebarWidth = 215;
var intSmallWidth = 103;

/* Collapse  */
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
    /* change arrow */
    $('.collapse-sidebar').addClass('hidden');
    $('.expand-sidebar').removeClass('hidden');
    /* hide sidebar text */
    $('.Sidebar .item-title').addClass('hidden');

    /* reduce sideba width */
    $('.Sidebar').css('width', intSmallWidth);
    $('.Sidebar-container').css('width', intSmallWidth);

    /* update app with */
    $('#app').css('grid-template-columns', `${intSmallWidth}px auto`)

    $('.PageContentContainer').css('padding', '0 120px 0 80px !important')

}


function expandSidebar() {
    /* change arrow */
    $('.expand-sidebar').addClass('hidden');
    $('.collapse-sidebar').removeClass('hidden');
    /* hide sidebar text */
    $('.Sidebar .item-title').removeClass('hidden');

    /* reduce sideba width */
    $('.Sidebar').css('width', intInitialSidebarWidth);
    $('.Sidebar-container').css('width', intInitialSidebarWidth);

    /* update app with */
    $('#app').css('grid-template-columns', `${intInitialSidebarWidth}px auto`)

    $('.PageContentContainer').css('padding', '0 139px 0 16px !important')


}
/* XX Sidebar XX */