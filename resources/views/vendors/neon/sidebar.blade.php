<div class="xp-leftbar">
    <!-- Start XP Sidebar -->
    <div class="xp-sidebar">
        <!-- Start XP Logobar -->
        <div class="xp-logobar text-center">
            <a href="{{url('/')}}" class="xp-logo"><img src="{{ url('vendors/images/sipandukp.png') }}" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End XP Logobar -->
        <!-- Start XP Navigationbar -->
        <div class="xp-navigationbar">
            <ul class="xp-vertical-menu">
                <li class="xp-vertical-header">Menu</li>
                @php
                    $menus = MenuService::getMenu();
                @endphp
                @foreach ($menus as $menu)
                    @if (empty($menu['roles']) || auth()->user()->hasRole($menu['roles']))
                    @if (empty($menu['submenus']))
                        @include('vendors.neon.partial_menu',[
                            'menu' => $menu,
                        ])
                    @else  
                        @include('vendors.neon.partial_menus',[
                            'menu' => $menu
                        ])    
                    @endif
                    @endif
                @endforeach
            </ul>
        </div>
        <!-- End XP Navigationbar -->
    </div>
    <!-- End XP Sidebar -->
</div>