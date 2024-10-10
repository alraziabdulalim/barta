<div class="py-4 text-gray-700 font-normal">
    @if (isset($post->picture))
        <img class="min-h-auto w-full rounded-lg object-cover max-h-64 md:max-h-72"
            src="{{ asset('storage/' . $post->picture) }}?auto=compress&amp;cs=tinysrgb&amp;w=1260&amp;h=750&amp;dpr=1"
            alt="{{ auth()->user()->first_name }}" />
    @endif

    <p>
        {{ $post->barta }}
    </p>
</div>

<div class="flex items-center gap-2 text-gray-500 text-xs my-2">
    <span class="">{{ $post->updated_at->diffForHumans() }}</span>
    <span class="">•</span>
    <span>450 views</span>
</div>
