<h3 class="font-bold text-lg mb-4">Following</h3>
<ul>
    @forelse (auth()->user()->follows as $user)
        <li class="mb-4">
            <a href="{{ route('profile', $user) }}"
               class="flex items-center text-sm"
            >
                <img src="{{ $user->avatar }}"
                    alt=""
                    class="rounded-full mr-2"
                    width="40"
                    heigth="40"
                >
                {{ $user->name }}
            </a>
        </li>
    @empty
        <li>No friends yet.</li>
    @endforelse
</ul>