@if (request()->is('tweets'))
    @push('javascript')
        <script src="{{ asset('js/tweet-panel.js') }}" defer></script>
    @endpush
@endif

@component('components.master')
    <section class="px-8">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                <div class="lg:w-1/6">
                    @include ('_sidebar-links')
                </div>

                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                    {{ $slot }}
                </div>

                <div class="flex flex-col justify-between lg:w-1/6 h-full">
                    <div class="bg-gray-200 border border-gray-300 rounded-lg py-4 px-6">
                        @include ('_friends-list')
                    </div>
                    @if (session('message'))
                        <div class="bg-green-200 border border-gray-300 rounded-lg py-4 px-6">
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </section>
@endcomponent