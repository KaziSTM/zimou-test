<div
    x-data="{
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
    class="space-y-6 overflow-y-hidden mt-2">
    <div>
        <x-atoms.link :label="trans('Dashboard')" route="dashboard" icon="house"/>
    </div>
    @foreach ($navigation as $title=> $links)
        <div class="space-y-1">
            <div x-show="!isCollapsed">
                <h4 class="px-4 font-base uppercase text-secondary-400 dark:text-secondary-200 text-xs ">
                    {!! $title !!}
                </h4>
            </div>
            <div>
                @foreach($links as $link)
                    <x-atoms.link :label="$link['label']" :route="$link['route']" :icon="$link['icon']"/>
                @endforeach
            </div>
        </div>

    @endforeach

</div>
