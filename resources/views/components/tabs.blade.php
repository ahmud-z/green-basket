<div
    x-data="{ tab: '{{ collect($tabs)->keys()->first() }}' }"
    class="mt-8"
>
    <!-- Tab Buttons -->
    <div class="border-b border-gray-200 flex -mb-px">
        @foreach ($tabs as $key => $label)
            <button
                @click="tab = '{{ $key }}'"
                :class="tab === '{{ $key }}'
                    ? 'border-emerald-600 text-emerald-600 border-b-2 font-medium'
                    : 'text-gray-600 font-medium border-transparent'"
                class="py-4 px-6 border-b-2"
            >
                {{ $label }}
            </button>
        @endforeach
    </div>

    <!-- Tab Content -->
    <div class="py-6">
        {{ $slot }}
    </div>
</div>
