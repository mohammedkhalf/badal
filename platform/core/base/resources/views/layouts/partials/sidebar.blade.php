@foreach ($menus = dashboard_menu()->getAll() as $menu)
    @php $menu = apply_filters(BASE_FILTER_DASHBOARD_MENU, $menu); @endphp
    @if(trans($menu['name']) !== "Blog" && trans($menu['name']) !== "Plugins" && trans($menu['name']) !== "Testimonials" && trans($menu['name']) !== "Appearance"
&& trans($menu['name']) !== "Pages"  && trans($menu['name']) !== "Static Blocks" && trans($menu['name']) !== "Simple sliders" && trans($menu['name']) !== "Media")
    <li class="nav-item @if ($menu['active']) active @endif" id="{{ $menu['id'] }}">
        <a href="{{ $menu['url'] }}" class="nav-link nav-toggle">
            <i class="{{ $menu['icon'] }}"></i>
            <span class="title">
                @if(trans($menu['name']) == "Real Estate")
                    Elbadal
                @else
                    {{ !is_array(trans($menu['name'])) ? trans($menu['name']) : null }}
                @endif

                {!! apply_filters(BASE_FILTER_APPEND_MENU_NAME, null, $menu['id']) !!}</span>
            @if (isset($menu['children']) && count($menu['children'])) <span class="arrow @if ($menu['active']) open @endif"></span> @endif
        </a>
        @if (isset($menu['children']) && count($menu['children']))
            <ul class="sub-menu @if (!$menu['active']) hidden-ul @endif">
                @foreach ($menu['children'] as $item)
                    @if(trans($item['name']) !== "Languages" && trans($item['name']) !== "Media" && trans($item['name']) !== "Permalink" && trans($item['name']) !== "Countries" && trans($item['name']) !== "System Updater" && trans($item['name']) !== "Cache management")
                    <li class="nav-item @if ($item['active']) active @endif" id="{{ $item['id'] }}">
                        <a href="{{ $item['url'] }}" class="nav-link">
                            <i class="{{ $item['icon'] }}"></i>
                            @if(trans($item['name']) == "Reviews")
                                Bids
                            @else
                            {{ trans($item['name']) }}
                            @endif
                            {!! apply_filters(BASE_FILTER_APPEND_MENU_NAME, null, $item['id']) !!}</span>
                        </a>
                    </li>
                    @endif
                @endforeach
            </ul>
        @endif
    </li>
    @endif
@endforeach
