@include('components.landing.header')
<div id="app">
    <Landing-Page 
    :packagesadhoclist="{{ $packages->adhoc }}" :packagebiweeklylist="{{ $packages->bi_weekly }}"
        :packagesmonthlylist="{{ $packages->monthly }}" packageshowroute="{{ route('package.show', 'package_id') }}"
        packagecreateroute="{{ route('user.packages.create') }}"
        searchcityurl="{{ route('search.city') }}"
        />
</div>
@include('components.landing.footer')
