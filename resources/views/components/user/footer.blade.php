<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/user.js') }}"></script>
<script>
    $(document).ready(function() {
        setTimeout(() => {
            $(".successMessage").addClass("d-none");
        }, 3000);
    })

</script>
</body>

</html>
