<div>
    <div class="flex items-start /space-x-3/">

        <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . auth()->user()->avatar) }}"
                alt="{{ auth()->user()->first_name }}" />
        </div>

        <div class="text-gray-700 font-normal w-full">
            <textarea
                class="block w-full p-2 pt-2 text-gray-900 rounded-lg border-none outline-none focus:ring-0 focus:ring-offset-0"
                name="barta" rows="2" placeholder="What's going on, {{ auth()->user()->first_name }}?">{{ $post->barta }}</textarea>
                @if (isset($post->picture))
                    <img class="min-h-auto w-full rounded-lg object-cover max-h-64 md:max-h-72"
                        src="{{ asset('storage/' . $post->picture) }}?auto=compress&amp;cs=tinysrgb&amp;w=1260&amp;h=750&amp;dpr=1"
                        alt="{{ auth()->user()->first_name }}" />
                @endif
        </div>
    </div>
</div>
