@if(count($attributes['actions']))
    <x-dropdown icon="dots-three-vertical" static>
        @foreach($attributes['actions'] as $action)
            <div class="flex w-full items-center justify-start ">
                <button flat wire:click="{{$action['action']}}({{json_encode($attributes['id'])}})"
                    @class([
"w-full h-full group inline-flex items-center justify-start gap-x-2  outline-none transition-all duration-200 ease-in-out hover:shadow-sm focus:-transparent disabled:cursor-not-allowed disabled:opacity-80 text-md px-4 py-2
 hover:bg-opacity-25 dark:hover:bg-opacity-15    rounded-md",
"text-red-600 hover:text-red-700 hover:bg-red-400 dark:hover:text-red-500 dark:hover:bg-red-600" => $action['action'] == "deleteConfirmation",
"text-yellow-600 hover:text-yellow-700 hover:bg-yellow-400 dark:hover:text-yellow-500 dark:hover:bg-yellow-600" => $action['action'] == "edit",
])
                >
                    <x-icon name="{{$action['icon']}}" color="{{$action['iconColor']}}" class="h-5 w-5">
                        <x-slot:right>
                            {{$action['label']}}
                        </x-slot:right>
                    </x-icon>
                </button>
            </div>
        @endforeach
    </x-dropdown>
@endif
