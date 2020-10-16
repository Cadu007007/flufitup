$('#showPassword').click(function() {
    if ($('#adminPassword').prop('type') == 'password') {
        $('#adminPassword').prop('type', 'text')
    } else {
        $('#adminPassword').prop('type', 'password')
    }
})

$('#showConfirmPassword').click(function() {
    if ($('#adminConfirmPassword').prop('type') == 'password') {
        $('#adminConfirmPassword').prop('type', 'text')
    } else {
        $('#adminConfirmPassword').prop('type', 'password')
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

    var left = $('.profile').offset().left - (($('.UserPopupList').width() - 50) / 2);
    $('.UserPopupList').css('left', `${left}px`)
}