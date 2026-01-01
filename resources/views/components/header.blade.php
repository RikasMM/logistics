@php
    use App\Helpers\MenuHelper;
@endphp

<header class="top-header">
    <div class="header-left">
        <button class="mobile-menu-btn" onclick="toggleSidebar()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 24px; height: 24px;">
                {!! MenuHelper::getIcon('menu') !!}
            </svg>
        </button>
        <div class="search-box">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px; height: 20px; color: #94a3b8;">
                {!! MenuHelper::getIcon('search') !!}
            </svg>
            <input type="text" placeholder="Search anything...">
        </div>
    </div>

    <div class="header-right">
        <button class="header-icon-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 20px; height: 20px; color: #64748b;">
                {!! MenuHelper::getIcon('notification') !!}
            </svg>
            <span class="notification-badge">3</span>
        </button>

        <div class="user-profile" style="position: relative;">
            <div class="user-avatar" onclick="toggleUserDropdown()">
                {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
            </div>
            <div class="user-info" onclick="toggleUserDropdown()">
                <div class="user-name">{{ Auth::user()->name ?? 'User' }}</div>
                <div class="user-role">{{ Auth::user()->getRoleNames()->first() ?? 'User' }}</div>
            </div>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu" id="userDropdown">
                @if(MenuHelper::routeExists('profile.show'))
                    <a href="{{ route('profile.show') }}" class="dropdown-item">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 18px; height: 18px;">
                            {!! MenuHelper::getIcon('profile') !!}
                        </svg>
                        My Profile
                    </a>
                @endif
                
                @if(MenuHelper::routeExists('settings.index'))
                    <a href="{{ route('settings.index') }}" class="dropdown-item">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 18px; height: 18px;">
                            {!! MenuHelper::getIcon('settings') !!}
                        </svg>
                        Settings
                    </a>
                @endif
                
                <div class="dropdown-divider"></div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item danger" style="width: 100%; border: none; background: none; cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 18px; height: 18px;">
                            {!! MenuHelper::getIcon('logout') !!}
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
