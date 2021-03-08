@extends('layouts.user')
@section('content')
<Profile-Edit 
class="PageContentContainer" 
id="ProfileEdit" 
date="{{Carbon\Carbon::now()->format('d/m/Y')}}"
formactionroute="{{ route('profile.update') }}"
profileimage="{{ asset('images/icons/profile.svg') }}"
:user="{{ $user }}"

/>

@endsection
