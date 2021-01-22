@extends('layouts.user')
@section('content')

<Package-Summary
class="PageContentContainer" 
id="PackageSummary" 
date="{{Carbon\Carbon::now()->format('m-d-Y')}}"
:package="{{ $package }}"
paymentroute="{{ route('package.payment', 'package_id') }}"
:drycleanitems="{{ $dry_clean_items }}"
:householditems="{{ $household_items }}"
:addedvalueoptions="{{ $options->added_value }}"
:addedvaluechoices="{{ $options->added_value_choices }}"
:detergentstypes="{{ $detergents_types }}"
:detergentstypesitems="{{ $detergents_types_items }}"
:dryertypes="{{ $dryer_sheet_types }}"
:dryertypesitems="{{ $dryer_sheet_types_items }}"
:boostertypes="{{ $booster_types }}"
:boostertypesitems="{{ $booster_types_items }}"
:fabrictypes="{{ $fabric_types }}"
:fabrictypesitems="{{ $fabric_types_items }}"
/>

@endsection
