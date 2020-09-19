@include('components.user.header')

<div id="app">
    <div class="Sidebar-container">

        <Sidebar active={{ $active }} 
        routetohome={{ route('home') }}
        routetopackages={{ route('packages') }}
        routetoprofile={{ route('profile') }}
        routetochat={{ route('chat') }}
        routetooldorders={{ route('old_orders') }}
        routetologout={{ route('login') }}
        ></Sidebar>
    </div>
    @yield('content')
</div>

@include('components.user.footer')