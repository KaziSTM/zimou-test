<div x-data="{
            isCollapsed: false,
            toggle() {
                this.isCollapsed = !this.isCollapsed;
                localStorage.setItem('sidebar-collapsed', JSON.stringify(this.isCollapsed));
            },
            load() {
                const savedState = localStorage.getItem('sidebar-collapsed');
                this.isCollapsed = savedState ? JSON.parse(savedState) : false;
            }
        }"
     x-init="load()"
     @sidebar-toggle.window="isCollapsed = $event.detail.isCollapsed"
     :class="{'p-0.5': isCollapsed, 'p-2.5': !isCollapsed}"
    @class([
        'flex items-center space-x-3 cursor-pointer text-secondary-900 dark:text-secondary-100 hover:text-primary-500 transition-all duration-300 ease-in-out',
        'text-primary-500 dark:hover:text-primary-200'=>request()->routeIs($request),
        ' dark:hover:text-primary-400'=>!request()->routeIs($request)
    ])>
    <a wire:navigate href="{{ route($route) }}"
        @class([
            'flex gap-4 items-center w-full px-4 py-2 text-sm',
            'font-light' =>request()->routeIs($request),
            'font-medium '=>!request()->routeIs($request)
        ])>
        @if($icon)
            <div :class="{'w-8 text-primary-500 dark:text-primary-700': isCollapsed, 'w-5': !isCollapsed}">
                @if(request()->routeIs($request))
                    <x-icon name="{{$icon}}" light/>
                @else
                    <x-icon name="{{$icon}}" thin/>
                @endif
            </div>

        @endif

        <!-- Show/Hide Label Based on Collapse State -->
        <span x-show="!isCollapsed" @class([
            'capitalize',
            'font-medium' =>request()->routeIs($request),
            'font-light'=>!request()->routeIs($request)
        ])>
            {!! trans($label) !!}
        </span>
    </a>
</div>
