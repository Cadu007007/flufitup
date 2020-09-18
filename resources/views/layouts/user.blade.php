@include('components.user.header')

<div id="app">
    <Sidebar active={{ $active }} 
    routetohome={{ route('home') }}
    routetopackages={{ route('packages') }}
    routetoprofile={{ route('profile') }}
    routetochat={{ route('chat') }}
    routetooldorders={{ route('old_orders') }}
    routetologout={{ route('login') }}
    ></Sidebar>
    @yield('content')
</div>

@include('components.user.footer')