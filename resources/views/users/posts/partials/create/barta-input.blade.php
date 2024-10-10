<div>
    <div class="flex items-start /space-x-3/">

        <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . auth()->user()->avatar) }}"
                alt="{{ auth()->user()->first_name }}" />
        </div>

        <div class="text-gray-700 font-normal w-full">
            <textarea
                class="block w-full p-2 pt-2 text-gray-900 rounded-lg border-none outline-none focus:ring-0 focus:ring-offset-0"
                name="barta" rows="2" placeholder="What's going on, {{ auth()->user()->first_name }}?"></textarea>
        </div>
    </div>
</div>
