<div class="flex p-4 border-b border-b-grey-400">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img src="{{ $tweet->user->avatar }}"
                alt=""
                class="rounded-full mr-2"
            >
        </a>
    </div>
    <div>
        <h5 class="text-bold mb-4">
            <a href="{{ route('profile', $tweet->user) }}">
                {{ $tweet->user->name }}
            </a>
        </h5>
        <p class="text-small">
            {{ $tweet->body }}
        </p>
    </div>
</div>