<div class="top-bar color-scheme-light">
    <div class="top-menu-controls">
        <div class="logged-user-w">
            <div class="logged-user-i">
                <div class="avatar-w">
                    <img alt="" src="{{ asset('assets/admin2/img/avatar.jpg') }}">
                </div>
                <div class="logged-user-menu color-style-bright" style="background: #972e25!important;">
                    <div class="logged-user-avatar-info">
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
                    <div class="bg-icon">
                        <i class="os-icon os-icon-wallet-loaded"></i>
                    </div>
                    <ul>
                        <li>
                            <a
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            ><i class="os-icon os-icon-signs-11">
                                </i><span>@lang('Logout')</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
