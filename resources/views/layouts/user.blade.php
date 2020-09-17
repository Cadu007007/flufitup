@include('components.user.header')

<div id="app">
    <Sidebar></Sidebar>
    @yield('content')
</div>

@include('components.user.footer')