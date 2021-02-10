/* ----- Verify phone -------- */
$(".digit-input").change(function() {
    console.log($(this).val());
    if (this.value.length == this.maxLength) {
        $(this).next('.digit-input').focus();
    }
});
$(".digit-input").focus(function() {
        $(this).select();
    })
    /* ----- XX Verify phone XX ------ */