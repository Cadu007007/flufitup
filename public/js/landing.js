/* ----- Verify phone -------- */
$(".digit-input").change(function() {
    console.log($(this).val());
    let enteredCode = $(this).val();
    if (enteredCode.length == 6) {
        /* fill other digits */
        loadCode(enteredCode)
    }
    if (this.value.length == this.maxLength) {
        $(this).next('.digit-input').focus();
    }
});
$(".digit-input").focus(function() {
    $(this).select();
})

function loadCode(verifyInput) {
    let enteredCode = verifyInput.value
    if (enteredCode.length == 6) {
        /* fill other digits */
        $('.digit-input').eq(0).val(enteredCode[0])
        $('.digit-input').eq(1).val(enteredCode[1])
        $('.digit-input').eq(2).val(enteredCode[2])
        $('.digit-input').eq(3).val(enteredCode[3])
        $('.digit-input').eq(4).val(enteredCode[4])
        $('.digit-input').eq(5).val(enteredCode[5])
    }
}
/* ----- XX Verify phone XX ------ */