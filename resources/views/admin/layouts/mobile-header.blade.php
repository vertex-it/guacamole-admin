<div class="menu-mobile menu-activated-on-click color-scheme-dark">
    <div class="mm-logo-buttons-w">
        <a class="mm-logo" href="{{ route('admin.commands.index') }}">
            <span>Guac Super Admin</span>
        </a>
        <div class="mm-buttons">
            <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
            </div>
        </div>
    </div>
    <div class="menu-and-user">
        <div class="logged-user-w">
            <div class="avatar-w">
                <img alt="" src="{{ asset('assets/admin2/img/avatar.jpg') }}">
            </div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">
                    {{ Auth::user()->name }}
                </div>
                <div class="logged-user-role">
                    Superadmin
                </div>
            </div>
        </div>

        @include ('admin.layouts.menu')

    </div>
</div>
