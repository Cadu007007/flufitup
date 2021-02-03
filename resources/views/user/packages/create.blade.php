@extends('layouts.user')
@section('content')

<Package-Create
class="PageContentContainer" 
id="PackageCreate" 
date="{{Carbon\Carbon::now()->format('m-d-Y')}}"
:serviceoptions="{{ $options->service }}"
:washoptions="{{ $options->wash }}"
:pickupsoptions="{{ $options->pickup }}"
:loadoptions="{{ $options->load_size }}"
:dateoptions="{{ $options->date }}"
:returndurationoptions="{{ $options->return_duration }}"
:addedvalueoptions="{{ $options->added_value }}"
:addedvaluechoices="{{ $options->added_value_choices }}"
formactionroute="{{ route('dummy') }}"
:drycleanitems="{{ $dry_clean_items }}"
:householditems="{{ $household_items }}"
:detergentstypes="{{ $detergents_types }}"
:detergentstypesitems="{{ $detergents_types_items }}"
:dryertypes="{{ $dryer_sheet_types }}"
:dryertypesitems="{{ $dryer_sheet_types_items }}"
:boostertypes="{{ $booster_types }}"
:boostertypesitems="{{ $booster_types_items }}"
:fabrictypes="{{ $fabric_types }}"
:fabrictypesitems="{{ $fabric_types_items }}"
summaryroute="{{ route('package.summary') }}"
/>

@endsection
