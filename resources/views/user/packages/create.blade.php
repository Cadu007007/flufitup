@include('components.user.header')

<div id="app">
    <div class="Sidebar-container">

    </div>
    {{-- {{ dd($detergents_types[0]->detergents) }} --}}
    <div class="d-flex flex-column">
        <div class="w-100 px-4 mb-0" style="  background: #FAFAFA;">
            @if (session()->get('message') != null)
                <div class="alert alert-success mt-3 text-center successMessage">{{ session()->get('message') }}</div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger mt-3 text-center errorMessage">
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                </div>
            @endif
        </div>
        <div class="PageContentContainer">

            <User-Create-Package title="Add Package" date="{{ Carbon\Carbon::now()->format('D, d F') }}"
                storepackageroute="{{ route('admin.packages.store') }}" :detergentstypes="{{ $detergents_types }}"
                :fabrictypes="{{ $fabric_types }}"
                :drycleanitems="{{ $dry_clean_items }}"
                :householditems="{{ $household_items }}" />
        </div>
    </div>
</div>
@include('components.user.footer')
{{-- @extends('layouts.user')
@section('content') --}}

{{-- <Package-Create
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
/> --}}

{{-- @endsection --}}
