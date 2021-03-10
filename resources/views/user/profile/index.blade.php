@extends('layouts.user')
@section('content')
<Profile 
class="PageContentContainer" 
id="Profile" 
name="{{ auth()->user()->first_name . ' '.auth()->user()->last_name }}"
lastlogin="Last Login : {{ auth()->user()->last_login }}"
profileimage="{{ (auth()->user()->avatar) ? asset(auth()->user()->avatar) : asset('images/icons/profile.svg') }}"
email="{{ auth()->user()->email }}"
{{-- emailstatus="{{  $test=0 }}" --}}
phone="{{  auth()->user()->phone }}"
{{-- phonestatus="{{  $test=1 }}" --}}
address="{{  auth()->user()->address }}"
birthday="{{  auth()->user()->birth_date }}"
editprofileroute="{{ route('profile.edit') }}"
changepasswordroute="{{  route('profile.change_password') }}"

walletvalue="{{ auth()->user()->wallet }}"
walletcurrency="{{ $test="USD" }}"
/>

@endsection
