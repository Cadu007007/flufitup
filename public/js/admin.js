$('#showPassword').click(function() {
    if ($('#adminPassword').prop('type') == 'password') {
        $('#adminPassword').prop('type', 'text')
    } else {
        $('#adminPassword').prop('type', 'password')
    }
})