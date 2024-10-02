<div class="py-4 text-gray-700 font-normal">
    <p>
        {{ $post->barta }}
    </p>
</div>

<div class="flex items-center gap-2 text-gray-500 text-xs my-2">
    <span class="">{{ $post->updated_at->diffForHumans() }}</span>
    <span class="">•</span>
    <span>450 views</span>
</div>
