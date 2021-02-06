<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/admin.js')}}"></script>
{{-- Sorting Tables --}}
<script src="{{asset('js/tinysort.js')}}"></script>
<script src="{{asset('js/table-sorting.js')}}"></script>
{{-- jQuery --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- Select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

<script>
    $(document).ready(function(){
        setTimeout(() => {
            
            $('.select2').select2()
        }, 500);
    })
</script>
</body>
</html>
