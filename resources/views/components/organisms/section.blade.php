<div class="space-y-5">
    <div class="flex justify-between ">
        @isset($title)
            <x-atoms.h1>
                {{ $title }}
            </x-atoms.h1>
        @endisset
        @isset($action)
            {{$action}}
        @endisset
    </div>
    @isset($description)
        <div class="md:max-w-7xl sm:mt-6 ">
            <p class="mt-4 text-sm text-secondary-700 dark:text-secondary-200">
                {{ $description }}
            </p>
        </div>
    @endisset
    <div class="mt-8">
        {{ $slot }}
    </div>
</div>
