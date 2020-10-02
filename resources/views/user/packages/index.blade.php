@extends('layouts.user')
@section('content')

<Packages 
class="PageContentContainer"
id="Packages" 
date="18/09/2020"
:packagesadhoclist="{{ $packages->adhoc}}"
:packagebiweeklylist="{{ $packages->bi_weekly}}"
:packagesmonthlylist="{{ $packages->monthly}}"
packageshowroute="{{ route('package.show', 'package_id') }}"
packagecreateroute="{{ route('package.create') }}"
/>

@endsection
