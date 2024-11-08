<div>
    <div class="relative mt-8">
        <div class="absolute -inset-2">
            <div
                class="w-full h-full mx-auto opacity-30 blur-lg filter animate-pulse bg-gradient-to-r from-primary-400 via-primary-500 to-black">
            </div>
        </div>
        <x-button wire:click="{{$action}}" lg class="relative block w-full" loading='{{$action}}'
                  color="black" text="{{ $label }}"/>
    </div>
</div>
