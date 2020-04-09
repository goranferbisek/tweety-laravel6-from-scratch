@component('components.app')
    <header class="mb-6 relative">
        <img src="/images/default-profile-banner.jpg"
            alt="Profile banner"
            class="mb-2"
        >

        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">
                    Joined {{ $user->created_at->diffForHumans() }}
                </p>
            </div>

            <div class="flex">
                <a href=""
                    class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">
                    Edit profile
                </a>
                @component('components.follow-button', ['user' => $user])
                @endcomponent
            </div>
        </div>

        <p class="text-sm">This it the user description. Lorem ipsum dolor sit
            amet consectetur adipisicing elit. Unde beatae a nisi veritatis
             ullam quod illo libero qui eos fugiat.
        </p>

        <img src="{{ $user->avatar }}"
                alt="User avatar"
                class="rounded-full mr-2 absolute"
                style="width: 150px; left: calc(50% - 75px); top: 138px"
        >

    </header>

    @include('_timeline', [
        'tweets' => $user->tweets
    ])
@endcomponent
