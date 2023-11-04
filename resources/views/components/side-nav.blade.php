<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="iconsminds-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @can('services')
                    <li class="{{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                        <a href="{{ route('admin.services.index') }}">
                            <i class="iconsminds-reverbnation"></i>Services
                        </a>
                    </li>
                @endcan

                @can('reels')
                    <li class="{{ request()->routeIs('admin.reels*') ? 'active' : '' }}">
                        <a href="{{ route('admin.reels.index') }}">
                        <i class="simple-icon-film"></i> Reels
                        </a>
                    </li>
                @endcan
                @can('clients')
                    <li class="{{ request()->routeIs('admin.clients*') ? 'active' : '' }}">
                        <a href="{{ route('admin.clients.index') }}">
                            <i class="simple-icon-people"></i> Clients
                        </a>
                    </li>
                @endcan
               
                @can('page_settings')
                    <li class="{{ request()->routeIs('admin.page*') ? 'active' : '' }}">
                        <a href="#pages">
                            <i class="simple-icon-settings"></i> Page Settings
                        </a>
                    </li>
                @endcan

                @can('general_settings')
                    <li class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings') }}">
                            <i class="simple-icon-wrench"></i> General Settings
                        </a>
                    </li>
                @endcan
                
                @can('roles')
                    <li class="{{ request()->routeIs('admin.roles*') ? 'active' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="simple-icon-lock-open"></i>User Roles
                        </a>
                    </li>
                @endcan

                @can('users')
                    <li class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="simple-icon-user"></i> Users
                        </a>
                    </li>
                @endcan
                @can('enquiries')
                    <li class="{{ request()->routeIs('admin.enquiries*') ? 'active' : '' }}">
                        <a href="{{ route('admin.enquiries') }}">
                            <i class="simple-icon-bubbles"></i>Enquiries
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">
            <ul class="list-unstyled" data-link="pages">
                <li class="{{ (request()->routeIs('admin.page.about') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.about') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">About Us</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.clients') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.clients') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Clients</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.contact') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.contact') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Contact Us</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.home') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.home') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Home</span>
                    </a>
                </li>
                
                <li class="{{ (request()->routeIs('admin.page.reels') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.reels') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Reels</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.services') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.services') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Services</span>
                    </a>
                </li>

                <li class="{{ (request()->routeIs('admin.page.social') ) ? 'active' : '' }}">
                    <a href="{{ route('admin.page.social') }}">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">Social</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
