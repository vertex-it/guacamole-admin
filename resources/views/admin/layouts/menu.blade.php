<ul class="main-menu">

    <li class="{{ Route::currentRouteName() == 'admin.commands.index' ? 'active' : '' }}">
        <a href="{{ route('admin.commands.index') }}">
            <div class="icon-w">
                <div class="os-icon os-icon-grid-squares"></div>
            </div>
            <span>@lang('Commands')</span>
        </a>
    </li>

    <li class="{{ Route::currentRouteName() == 'admin.command-groups.index' ? 'active' : '' }}">
        <a href="{{ route('admin.command-groups.index') }}">
            <div class="icon-w">
                <div class="os-icon os-icon-grid-squares"></div>
            </div>
            <span>@lang('Command groups')</span>
        </a>
    </li>
</ul>
