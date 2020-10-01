$('#showPassword').click(function() {
    if ($('#adminPassword').prop('type') == 'password') {
        $('#adminPassword').prop('type', 'text')
    } else {
        $('#adminPassword').prop('type', 'password')
    }
})


/* Popup lists position */
$(window).resize(function() {
    ReArrangePopupLists()
});

$(document).ready(function() {
    ReArrangePopupLists()
})

function ReArrangePopupLists() {
    var left = $('.chat').offset().left - (($('.ChatPopupList').width() - 50) / 2);
    $('.ChatPopupList').css('left', `${left}px`)

    var left = $('.notifications').offset().left - (($('.NotificationsPopupList').width() - 50) / 2);
    $('.NotificationsPopupList').css('left', `${left}px`)
}