<header class="w-full">
    <div
        class="relative z-10 flex flex-shrink-0 h-20 bg-white dark:bg-gray-800 border-b shadow-sm border-slate-200 dark:border-gray-700">
        <x-button flat icon="list" lg @click="open = true ;$dispatch('resize')"
                  class="block md:hidden focus:outline-none"/>
        <div class="flex justify-between flex-1 px-4 sm:px-6">
            <div class="flex items-center flex-1">
                <a href="{{ route('dashboard') }}"
                   class="flex rounded outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2">
                    <x-atoms.logo class="w-8 sm:w-10 md:w-12 lg:w-14"/>
                </a>
            </div>
            <div
                class="flex items-center gap-4">
                <x-theme-switch/>

                @auth()
                    <x-dropdown>
                        <x-slot:action>
                            <img @click="show = !show" class="w-12 h-12 rounded-full cursor-pointer"
                                 src="{{ auth()->user()->avatar }}" alt="">
                        </x-slot:action>
                        <x-slot:header>
                            <div class="grid gap-4">
                                <p>{{ auth()->user()->name }}</p>
                                <p>{{ auth()->user()->email }}</p>
                            </div>
                        </x-slot:header>

                        <a wire:navigate href="{{route('logout')}}">
                            <x-dropdown.items class=" hover:text-white"
                                              icon="arrow-square-left" text="Logout"
                                              separator/>
                        </a>
                    </x-dropdown>
                @endauth
            </div>
        </div>
</header>
