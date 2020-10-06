@extends('layouts.user')
@section('content')

<Old-Orders 
class="PageContentContainer" 
id="OldOrders" 
date="{{Carbon\Carbon::now()->format('d/m/Y')}}"
showorderroute="{{ route('old_orders.show', 'order_id') }}"

:orders="{{ $orders }}"
/>

@endsection
