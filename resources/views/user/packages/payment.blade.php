
@extends('layouts.user')
@section('content')


<Online-Payment 
class="PageContentContainer" 
id="OnlinePayment" 
date="{{Carbon\Carbon::now()->format('d/m/Y')}}"
formactionroute="{{ route('dummy') }}"
/>

@endsection
