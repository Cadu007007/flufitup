@extends('layouts.user')
@section('content')

<Profile-Change-Password 
class="PageContentContainer" 
id="ProfileChangePassword"
formactionroute="{{ route('profile.change.password') }}"
/>


@endsection
