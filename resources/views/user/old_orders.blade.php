@extends('layouts.user')
@section('content')

<Oldorders 
class="PageContentContainer" 
id="OldOrders" 
date="18/09/2020"

:orders="{{ $orders }}"
/>

@endsection
