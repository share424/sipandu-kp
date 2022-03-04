

@if (empty($menu['can']))
    <li>
        <a href="{{ $menu['url'] ?? '' }}">
            <i class="{{ $menu['icon'] ?? 'icon-speedometer' }}"></i>
            <span>{{ $menu['text'] ?? 'Menu' }}</span>
        </a>
    </li>
@else  
    @if (Gate::allows($menu['can']))
        <li>
            <a href="{{ $menu['url'] ?? '' }}">
                <i class="{{ $menu['icon'] ?? 'icon-speedometer' }}"></i>
                <span>{{ $menu['text'] ?? 'Menu' }}</span>
            </a>
        </li>
    @endif
@endif
