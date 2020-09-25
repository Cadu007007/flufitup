@extends('layouts.user')
@section('content')
<Home class="PageContentContainer"
 id="Home" 
 date="18/09/2020"
 :orders="{{ $orders }}"
 editorderroute="{{ route('order.edit', 'order_id') }}"
 />
@endsection
