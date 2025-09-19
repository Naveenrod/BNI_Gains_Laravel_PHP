<nav class="bni-navigation bg-white shadow-lg border-b-4 border-red-500">
    <style>
        .bni-navigation {
    background: linear-gradient(135deg, #ffffff 0%, #fdf1f1 100%);
    box-shadow: 0 6px 20px rgba(231, 76, 60, 0.15);
    border-bottom: 4px solid #e74c3c;
    position: sticky;
    top: 0;
    z-index: 50;
}

/* Logo */
.bni-logo {
    background: linear-gradient(135deg, #e74c3c, #ff6b6b);
    color: white;
    padding: 10px 20px;
    border-radius: 30px;
    font-weight: 700;
    font-size: 1.3rem;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(231, 76, 60, 0.35);
    letter-spacing: 1px;
}

.bni-logo:hover {
    transform: scale(1.05) translateY(-2px);
    box-shadow: 0 6px 20px rgba(231, 76, 60, 0.45);
}

/* Nav links */
.nav-link-bni {
    color: #34495e;
    padding: 12px 22px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    position: relative;
    font-size: 0.95rem;
}

.nav-link-bni:hover {
    color: #e74c3c;
    background: rgba(231, 76, 60, 0.08);
    transform: translateY(-1px);
}

/* Active nav link */
.nav-link-active {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white !important;
    box-shadow: 0 4px 12px rgba(231, 76, 60, 0.35);
}

/* Dropdown button */
.user-dropdown-trigger {
    background: #fff;
    border: 2px solid #f1f1f1;
    color: #2c3e50;
    padding: 8px 18px;
    border-radius: 30px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.user-dropdown-trigger:hover {
    border-color: #e74c3c;
    background: rgba(231, 76, 60, 0.06);
    color: #e74c3c;
}

/* Dropdown */
.dropdown-content {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    border: none;
    padding: 10px 0;
    min-width: 220px;
    overflow: hidden;
    animation: fadeIn 0.25s ease-in-out;
}

.dropdown-item {
    color: #2c3e50;
    padding: 14px 20px;
    text-decoration: none;
    display: block;
    transition: all 0.2s ease;
    font-weight: 500;
}

.dropdown-item:hover {
    background: linear-gradient(135deg, rgba(231, 76, 60, 0.1), rgba(231, 76, 60, 0.15));
    color: #e74c3c;
    padding-left: 24px;
}

/* User avatar */
.user-avatar {
    background: linear-gradient(135deg, #e74c3c, #ff6b6b);
    color: white;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1rem;
    box-shadow: 0 4px 10px rgba(231, 76, 60, 0.4);
}

/* Mobile menu button */
.mobile-menu-btn {
    background: #fff;
    border: 2px solid #f1f1f1;
    color: #2c3e50;
    padding: 10px;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.mobile-menu-btn:hover {
    border-color: #e74c3c;
    background: rgba(231, 76, 60, 0.05);
    color: #e74c3c;
}

/* Mobile links */
.mobile-nav-link {
    color: #2c3e50;
    padding: 16px 20px;
    border-left: 4px solid transparent;
    text-decoration: none;
    display: block;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}

.mobile-nav-link:hover {
    background: rgba(231, 76, 60, 0.06);
    border-left-color: #e74c3c;
    color: #e74c3c;
}

.mobile-nav-active {
    background: rgba(231, 76, 60, 0.12);
    border-left-color: #e74c3c;
    color: #e74c3c;
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-5px); }
    to { opacity: 1; transform: translateY(0); }
}


        
    </style>

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- BNI Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="bni-logo">
                        🏆 BNI GAINS
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:ms-10 sm:flex">
                    <a href="{{ route('dashboard') }}" class="nav-link-bni {{ request()->routeIs('dashboard') ? 'nav-link-active' : '' }}">
                        📊 Dashboard
                    </a>
                    <a href="{{ route('profiles.create') }}" class="nav-link-bni {{ request()->routeIs('profiles.create') ? 'nav-link-active' : '' }}">
                        ➕ Create Profile
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="user-dropdown-trigger">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->first_name ?? 'G', 0, 1)) }}
                        </div>
                        <div class="flex flex-col items-start">
                            <div class="font-medium">{{ Auth::user()->first_name ?? 'Guest' }}</div>
                            <div class="text-xs text-gray-500">{{ Auth::user()->business_name ?? 'BNI Member' }}</div>
                        </div>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         @click.outside="open = false"
                         class="absolute right-0 mt-2 dropdown-content"
                         style="display: none;">
                        
                        <a href="{{ route('dashboard') }}" class="dropdown-item">
                            👤 My Profiles
                        </a>
                        <a href="{{ route('profiles.create') }}" class="dropdown-item">
                            ➕ Create New
                        </a>
                        <div class="border-t border-gray-200 my-2"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" 
                               class="dropdown-item"
                               onclick="event.preventDefault(); this.closest('form').submit();">
                                🚪 Log Out
                            </a>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="mobile-menu-btn">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden mobile-menu" x-data="{ open: false }">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="mobile-nav-link {{ request()->routeIs('dashboard') ? 'mobile-nav-active' : '' }}">
                📊 Dashboard
            </a>
            <a href="{{ route('profiles.create') }}" class="mobile-nav-link {{ request()->routeIs('profiles.create') ? 'mobile-nav-active' : '' }}">
                ➕ Create Profile
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="user-info-section">
            <div class="flex items-center mb-4">
                <div class="user-avatar mr-3">
                    {{ strtoupper(substr(Auth::user()->first_name ?? 'G', 0, 1)) }}
                </div>
                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->first_name ?? 'Guest' }} {{ Auth::user()->last_name ?? '' }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email ?? 'guest@example.com' }}</div>
                    @if(Auth::user()->business_name)
                        <div class="text-xs text-gray-400">{{ Auth::user()->business_name }}</div>
                    @endif
                </div>
            </div>

            <div class="space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" 
                       class="mobile-nav-link"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        🚪 Log Out
                    </a>
                </form>
            </div>
        </div>
    </div>

    <!-- Alpine.js for dropdown functionality -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</nav>