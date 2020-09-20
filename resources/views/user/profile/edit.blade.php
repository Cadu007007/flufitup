@extends('layouts.user')
@section('content')

<Profile-Edit 
class="PageContentContainer" 
id="ProfileEdit" 
formactionroute="{{ route('dummy') }}"
/>

@endsection
