/* Why choose us hover effects */
$('.feature-container').hover(function() {

    $('.feature-container').removeClass('active');
    $(this).addClass('active');
});
/* XX Why choose us hover effects XX */


/* ----- Verify phone -------- */
$(".digit-input").change(function() {
    if (this.value.length == this.maxLength) {
        $(this).next('.digit-input').focus();
    }
});
$(".digit-input").focus(function() {
        $(this).select();
    })
    /* ----- XX Verify phone XX ------ */