@extends('layouts.user')
@section('content')

<Old-Order-Details
class="PageContentContainer" 
id="OldOrderDetails" 
date="{{Carbon\Carbon::now()->format('d/m/Y')}}"
:order="{{ $order }}"
feedbackactionroute="{{ route('dummy') }}"
/>

@endsection
