@component('components.app')
    <header class="mb-6 relative">
        <div class="relative">
            <img src="{{ $user->banner }}"
                alt="Profile banner"
                class="rounded-lg mb-2 h-48 object-cover w-full"
            >

            <img src="{{ $user->avatar }}"
                    alt="User avatar"
                    class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                    style="left: 50%"
                    width="150px"
            >
        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 200px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">
                    Joined {{ $user->created_at->diffForHumans() }}
                </p>
            </div>

            <div class="flex">
                @can('edit', $user)
                    <a href="{{ $user->path('edit') }}"
                        class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">
                        Edit profile
                    </a>
                @endcan

                @component('components.follow-button', ['user' => $user])
                @endcomponent
            </div>
        </div>

        <p class="text-sm">
            {{ $user->description ?: 'This user has no description yet.'}}
        </p>
    </header>

    @include('_timeline', [
        'tweets' => $tweets
    ])
@endcomponent
