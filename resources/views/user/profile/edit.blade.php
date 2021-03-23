@extends('layouts.user')
@section('content')
{{-- {{dd($user->addresses)}} --}}
<Profile-Edit 
class="PageContentContainer" 
id="ProfileEdit" 
date="{{Carbon\Carbon::now()->format('d/m/Y')}}"
formactionroute="{{ route('profile.update') }}"
profileimage="{{ (auth()->user()->avatar) ? asset(auth()->user()->avatar) : asset('images/icons/profile.svg') }}"
:user="{{ $user }}"

/>

@endsection
