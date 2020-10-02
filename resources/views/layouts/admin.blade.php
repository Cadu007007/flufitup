@include('components.admin.header')

<div id="app">
        <div class="Navbar">
            <Admin-Navbar
            viewallchatroute="{{ route('admin.dashboard') }}"
            viewallnotificationsroute="{{ route('admin.dashboard') }}"
            showprofileroute=""
            settingsroute=""
            logoutroute="{{ route('admin.login') }}"
            userimage="/images/icons/profile.svg"
            />
        </div>
        <div class="AdminPageContainer">
            <div class="AdminSidebar">
                <Admin-Sidebar 
                active="{{ $active }}"
                routetodashboard="{{ route('admin.dashboard') }}"
                routetoreports="{{ route('admin.reports') }}"
                routetopackages="{{ route('admin.packages') }}"
                routetousers="{{ route('admin.users') }}"
                routetoadmins="{{ route('admin.admins') }}"
                />
            </div>

            <div class="PageContainer">
                @yield('content')
            </div>
        </div>
</div>

@include('components.admin.footer')