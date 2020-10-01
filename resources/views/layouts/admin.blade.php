@include('components.admin.header')

<div id="app">
        <div class="AdminNavbar">
            <Admin-Navbar
            :chatsnotifications="{{ $chat_notifications }}"
            :chatcount="{{ Count($chat_notifications) }}"
            :notifications="{{ $notifications }}"
            :notificationscount="{{ Count($notifications) }}"
            viewallchatroute="{{ route('admin.dashboard') }}"
            viewallnotificationsroute="{{ route('admin.dashboard') }}"
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