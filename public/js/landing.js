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