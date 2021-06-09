<div class="menu-w selected-menu-color-light menu-activated-on-click menu-has-selected-link color-scheme-dark color-style-bright sub-menu-color-bright menu-position-side menu-side-left menu-layout-compact sub-menu-style-inside" style="min-height: 100vh">
    <div class="logo-w">
        <a class="logo" href="{{ route('admin.commands.index') }}">
            <div class="logo-element"></div>
            <div class="logo-label">Guac Super Admin</div>
        </a>
    </div>
    <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
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
    </div>
    <h1 class="menu-page-header">Page Header</h1>

    @include ('admin.layouts.menu')
</div>
