@include('components.admin.header')

<div id="app">
        <div class="AdminNavbar">
            <Admin-Navbar
            :chatcount="{{ $chat_count }}"
            :notificationscount="{{ $notifications_count }}"
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