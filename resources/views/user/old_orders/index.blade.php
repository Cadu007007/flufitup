@extends('layouts.user')
@section('content')

<Old-Orders 
class="PageContentContainer" 
id="OldOrders" 
date="18/09/2020"
showorderroute="{{ route('old_orders.show', 'order_id') }}"

:orders="{{ $orders }}"
/>

@endsection
