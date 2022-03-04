@if (empty($menu['can']))
    <li>
        <a href="javaScript:void();">
            <i class="{{ $menu['icon'] ?? 'icon-layers' }}"></i>
                <span>{{ $menu['text'] ?? '' }}</span>
            <i class="icon-arrow-right pull-right"></i>
        </a>
        <ul class="xp-vertical-submenu">
            @foreach ($menu['submenus'] as $submenu)
                @if (empty($submenu['roles']) || auth()->user()->hasRole($submenu['roles']))
                @include('vendors.neon.partial_sub_menu',[
                    'submenu' => $submenu
                ])
                @endif
            @endforeach
        </ul>
    </li>
@else  
    @if (Gate::allows($menu['can']))
        <li>
            <a href="javaScript:void();">
                <i class="{{ $menu['icon'] ?? 'icon-layers' }}"></i>
                    <span>{{ $menu['text'] ?? '' }}</span>
                <i class="icon-arrow-right pull-right"></i>
            </a>
            <ul class="xp-vertical-submenu">
                @foreach ($menu['submenus'] as $submenu)
                    @include('vendors.neon.partial_sub_menu',[
                        'submenu' => $submenu
                    ])
                @endforeach
            </ul>
        </li>
    @endif
@endif
