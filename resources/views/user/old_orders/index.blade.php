@extends('layouts.user')
@section('content')

<Old-Orders 
class="PageContentContainer" 
id="OldOrders" 
date="18/09/2020"

:orders="{{ $orders }}"
/>

@endsection
