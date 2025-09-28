<nav class="bni-navigation bg-white shadow-lg border-b-4 border-red-500" x-data="{ open: false }">
    <style>
        .bni-navigation {
            background: linear-gradient(135deg, #ffffff 0%, #fdf1f1 100%);
            box-shadow: 0 2px 8px rgba(231, 76, 60, 0.15);
            border-bottom: 3px solid #e74c3c;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 60px;
            padding: 8px 0;
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        /* Logo Styles */
        .bni-logo {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 700;
            font-size: 1.2rem;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 3px 12px rgba(231, 76, 60, 0.3);
            letter-spacing: 0.5px;
            display: inline-block;
        }

        .bni-logo:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(231, 76, 60, 0.4);
            text-decoration: none;
        }

        /* Navigation Links Container */
        .nav-links-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Navigation Links */
        .nav-link-bni {
            color: #2c3e50;
            padding: 10px 18px;
            border-radius: 20px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            white-space: nowrap;
            position: relative;
        }

        .nav-link-bni:hover {
            color: #e74c3c;
            background: rgba(231, 76, 60, 0.08);
            transform: translateY(-1px);
            text-decoration: none;
        }

        /* Active Navigation Link */
        .nav-link-active {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white !important;
            box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
        }

        .nav-link-active:hover {
            color: white !important;
            background: linear-gradient(135deg, #c0392b, #a93226);
        }

        /* User Dropdown Trigger */
        .user-dropdown-trigger {
            background: #ffffff;
            border: 2px solid #f1f2f6;
            color: #2c3e50;
            padding: 8px 16px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .user-dropdown-trigger:hover {
            border-color: #e74c3c;
            background: rgba(231, 76, 60, 0.05);
            color: #e74c3c;
        }

        /* User Avatar */
        .user-avatar {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: 0 2px 8px rgba(231, 76, 60, 0.3);
        }

        /* User Info Text */
        .user-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            line-height: 1.2;
        }

        .user-name {
            font-size: 0.9rem;
            font-weight: 600;
            margin: 0;
        }

        .user-subtitle {
            font-size: 0.75rem;
            color: #6c757d;
            margin: 0;
        }

        /* Dropdown Arrow */
        .dropdown-arrow {
            width: 16px;
            height: 16px;
            transition: transform 0.2s ease;
        }

        .dropdown-arrow.rotated {
            transform: rotate(180deg);
        }

        /* Dropdown Content */
        .dropdown-content {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            border: 1px solid #e9ecef;
            padding: 8px 0;
            min-width: 200px;
            overflow: hidden;
            animation: dropdownFadeIn 0.2s ease-out;
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 8px;
            z-index: 1000;
        }

        @keyframes dropdownFadeIn {
            from { 
                opacity: 0; 
                transform: translateY(-8px) scale(0.95); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0) scale(1); 
            }
        }

        /* Dropdown Items */
        .dropdown-item {
            color: #2c3e50;
            padding: 12px 20px;
            text-decoration: none;
            display: block;
            transition: all 0.2s ease;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .dropdown-item:hover {
            background: linear-gradient(135deg, rgba(231, 76, 60, 0.08), rgba(231, 76, 60, 0.12));
            color: #e74c3c;
            padding-left: 24px;
            text-decoration: none;
        }

        /* Dropdown Divider */
        .dropdown-divider {
            height: 1px;
            background: #e9ecef;
            margin: 8px 0;
            border: none;
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            background: #ffffff;
            border: 2px solid #f1f2f6;
            color: #2c3e50;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mobile-menu-btn:hover {
            border-color: #e74c3c;
            background: rgba(231, 76, 60, 0.05);
            color: #e74c3c;
        }

        /* Mobile Menu */
        .mobile-menu {
            background: #ffffff;
            border-top: 1px solid #e9ecef;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        /* Mobile Navigation Links */
        .mobile-nav-link {
            color: #2c3e50;
            padding: 16px 20px;
            border-left: 4px solid transparent;
            text-decoration: none;
            display: block;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .mobile-nav-link:hover {
            background: rgba(231, 76, 60, 0.06);
            border-left-color: #e74c3c;
            color: #e74c3c;
            text-decoration: none;
        }

        .mobile-nav-active {
            background: rgba(231, 76, 60, 0.1);
            border-left-color: #e74c3c;
            color: #e74c3c;
        }

        /* Mobile User Info Section */
        .mobile-user-section {
            background: #f8f9fa;
            padding: 20px;
            border-top: 1px solid #e9ecef;
        }

        .mobile-user-info {
            display: flex;
            align-items: center;
            margin-bottom: 16px;
        }

        .mobile-user-avatar {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            margin-right: 12px;
            box-shadow: 0 2px 8px rgba(231, 76, 60, 0.3);
        }

        .mobile-user-details {
            flex: 1;
        }

        .mobile-user-name {
            font-size: 1rem;
            font-weight: 600;
            color: #2c3e50;
            margin: 0 0 4px 0;
        }

        .mobile-user-email {
            font-size: 0.875rem;
            color: #6c757d;
            margin: 0 0 2px 0;
        }

        .mobile-user-business {
            font-size: 0.75rem;
            color: #95a5a6;
            margin: 0;
        }

        /* Responsive Design */
        @media (min-width: 640px) {
            .nav-container {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
            
            .nav-links-container {
                gap: 16px;
            }
        }

        @media (min-width: 1024px) {
            .nav-container {
                padding-left: 2rem;
                padding-right: 2rem;
            }
            
            .nav-links-container {
                gap: 24px;
            }
        }

        @media (max-width: 639px) {
            .bni-logo {
                font-size: 1rem;
                padding: 6px 16px;
            }
            
            .nav-container {
                min-height: 56px;
            }
        }

        /* Utility Classes */
        .hidden {
            display: none;
        }

        .block {
            display: block;
        }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .relative {
            position: relative;
        }

        .absolute {
            position: absolute;
        }
    </style>

    <!-- Primary Navigation Menu -->
    <div class="nav-container">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="{{ route('welcome') }}" class="bni-logo">
                BNI GAINS
            </a>
        </div>

        <!-- Navigation Links (Desktop) -->
        <div class="hidden nav-links-container" id="desktop-nav">
            @auth
                <a href="{{ route('dashboard') }}" class="nav-link-bni {{ request()->routeIs('dashboard') ? 'nav-link-active' : '' }}">
                    Dashboard
                </a>
                
            @endauth
        </div>

        <!-- Right Side Content -->
        <div class="hidden items-center" id="desktop-user">
            @auth
                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="user-dropdown-trigger">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->first_name ?? 'U', 0, 1)) }}
                        </div>
                        <div class="user-info">
                            <div class="user-name">{{ Auth::user()->first_name ?? 'User' }}</div>
                            <div class="user-subtitle">{{ Auth::user()->business_name ?? 'BNI Member' }}</div>
                        </div>
                        <svg class="dropdown-arrow" :class="{ 'rotated': open }" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" @click.outside="open = false" class="dropdown-content" style="display: none;">
                        <a href="{{route('profile.edit')}}" class="dropdown-item">My Account</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </a>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <div class="nav-links-container">
                    <a href="{{ route('login') }}" class="nav-link-bni">Sign In</a>
                    <a href="{{ route('register') }}" class="nav-link-bni">Register</a>
                </div>
            @endguest
        </div>

        <!-- Mobile Hamburger Menu
        <div class="flex items-center" id="mobile-toggle">
            <button @click="open = !open" class="mobile-menu-btn">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden mobile-menu">
        @auth
            <div>
                <a href="{{ route('dashboard') }}" class="mobile-nav-link {{ request()->routeIs('dashboard') ? 'mobile-nav-active' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('profiles.create') }}" class="mobile-nav-link {{ request()->routeIs('profiles.create') ? 'mobile-nav-active' : '' }}">
                    Create Profile
                </a>
            </div>

            <!-- Mobile User Section -->
            <div class="mobile-user-section">
                <div class="mobile-user-info">
                    <div class="mobile-user-avatar">
                        {{ strtoupper(substr(Auth::user()->first_name ?? 'U', 0, 1)) }}
                    </div>
                    <div class="mobile-user-details">
                        <div class="mobile-user-name">{{ Auth::user()->first_name ?? 'User' }} {{ Auth::user()->last_name ?? '' }}</div>
                        <div class="mobile-user-email">{{ Auth::user()->email ?? 'user@example.com' }}</div>
                        @if(Auth::user()->business_name)
                            <div class="mobile-user-business">{{ Auth::user()->business_name }}</div>
                        @endif
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="mobile-nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </a>
                </form>
            </div> -->
        @endauth

        @guest
            <div>
                <a href="{{ route('login') }}" class="mobile-nav-link">Sign In</a>
                <a href="{{ route('register') }}" class="mobile-nav-link">Register</a>
            </div>
        @endguest
    </div>

    <!-- JavaScript for responsive behavior -->
    <script>
        // Show/hide desktop navigation based on screen size
        function updateNavVisibility() {
            const desktopNav = document.getElementById('desktop-nav');
            const desktopUser = document.getElementById('desktop-user');
            const mobileToggle = document.getElementById('mobile-toggle');
            
            if (window.innerWidth >= 640) { // sm breakpoint
                desktopNav.classList.remove('hidden');
                desktopNav.classList.add('flex');
                desktopUser.classList.remove('hidden');
                desktopUser.classList.add('flex');
                mobileToggle.classList.add('hidden');
            } else {
                desktopNav.classList.add('hidden');
                desktopNav.classList.remove('flex');
                desktopUser.classList.add('hidden');
                desktopUser.classList.remove('flex');
                mobileToggle.classList.remove('hidden');
            }
        }

        // Run on load and resize
        window.addEventListener('load', updateNavVisibility);
        window.addEventListener('resize', updateNavVisibility);
    </script>

    <!-- Alpine.js for dropdown functionality -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</nav>