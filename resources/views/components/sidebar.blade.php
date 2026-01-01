@php
    use App\Helpers\MenuHelper;
    $menuSections = MenuHelper::getSidebarMenu();
@endphp

<aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <h1>
            <span class="logo-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 24px; height: 24px; color: white;">
                    {!! MenuHelper::getIcon('truck') !!}
                </svg>
            </span>
            {{ config('app.name', 'Logistics') }}
        </h1>
    </div>

    <nav class="sidebar-menu">
        @foreach ($menuSections as $section)
            <div class="menu-section">
                <div class="menu-section-title">{{ $section['section'] }}</div>
            </div>

            @foreach ($section['items'] as $item)
                @if (isset($item['submenu']))
                    @php
                        $isActive = false;
                        foreach ($item['submenu'] as $subItem) {
                            if (MenuHelper::isActive($subItem['route'])) {
                                $isActive = true;
                                break;
                            }
                        }
                    @endphp
                    <div x-data="{ open: {{ $isActive ? 'true' : 'false' }} }">
                        <button @click="open = !open" 
                                class="menu-item w-full justify-between"
                                :class="{ 'active': {{ $isActive ? 'true' : 'false' }}, 'bg-white/5': open && !{{ $isActive ? 'true' : 'false' }} }">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    {!! MenuHelper::getIcon($item['icon']) !!}
                                </svg>
                                {{ $item['name'] }}
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                 class="w-4 h-4 transition-transform duration-200"
                                 :class="{ 'rotate-180': open }">
                                {!! MenuHelper::getIcon('chevron-down') !!}
                            </svg>
                        </button>

                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 -translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 -translate-y-2"
                             class="pl-4 mt-1 space-y-1">
                            @foreach ($item['submenu'] as $subItem)
                                <a href="{{ MenuHelper::getRoute($subItem['route']) }}" 
                                   class="menu-item text-sm pl-10 {{ MenuHelper::isActive($subItem['route']) ? 'active' : 'text-slate-400 hover:text-white' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        {!! MenuHelper::getIcon($subItem['icon']) !!}
                                    </svg>
                                    {{ $subItem['name'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ MenuHelper::getRoute($item['route']) }}" 
                       class="menu-item {{ MenuHelper::isActive($item['route']) ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            {!! MenuHelper::getIcon($item['icon']) !!}
                        </svg>
                        {{ $item['name'] }}
                    </a>
                @endif
            @endforeach
        @endforeach
    </nav>
</aside>
