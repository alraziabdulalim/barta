<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"
class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6 space-y-3">
@csrf
@include('users.posts.partials.create.barta-input')

<div>
    <div class="flex items-center justify-between">
        <div class="flex gap-4 text-gray-600">
            @include('users.posts.partials.create.picture-input')

            @include('users.posts.partials.create.gif')
        </div>

        <div>
            <button type="submit"
                class="-m-2 flex gap-2 text-xs items-center rounded-full px-4 py-2 font-semibold bg-gray-800 hover:bg-black text-white">
                Post
            </button>
        </div>
    </div>
</div>

@if (session('post-create') === 'post-create-yes')
    <p class="text-sm text-gray-600 dark:text-gray-400" x-data="{ show: true }" x-show="show" x-transition
        x-init="setTimeout(() => show = false, 2000)">{{ __('Profile Picture updated successfully.!') }}</p>
@endif
</form>

@error('avatar')
{{ $message }}
@enderror
