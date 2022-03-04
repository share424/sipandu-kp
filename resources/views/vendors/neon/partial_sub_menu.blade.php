@if (empty($submenu['can']))
    <li>
        <a href="{{ $submenu['url'] }}">{{ $submenu['text'] }}</a>
    </li>
@else  
    @if (Gate::allows($submenu['can']))
        <li>
            <a href="{{ $submenu['url'] }}">{{ $submenu['text'] }}</a>
        </li>
    @endif
@endif