@extends('layouts.user')
@section('content')

<Package-Create
class="PageContentContainer" 
id="PackageCreate" 
date="21/09/2020"
:serviceoptions="{{ $options->service }}"
:washoptions="{{ $options->wash }}"
:pickupsoptions="{{ $options->pickup }}"
:loadoptions="{{ $options->load_size }}"
:dateoptions="{{ $options->date }}"
:returndurationoptions="{{ $options->return_duration }}"
:addedvalueoptions="{{ $options->added_value }}"
:addedvaluechoices="{{ $options->added_value_choices }}"
formactionroute="{{ route('dummy') }}"
/>

@endsection
