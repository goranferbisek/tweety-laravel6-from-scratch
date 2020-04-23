<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img src="{{ $tweet->user->avatar }}"
                alt=""
                class="rounded-full mr-2"
                width="50"
                heigth="50"
            >
        </a>
    </div>
    <div class="w-full">
        <div class="flex justify-between">
            <h5 class="text-bold mb-4">
                <a href="{{ route('profile', $tweet->user) }}">
                    {{ $tweet->user->name }}
                </a>
            </h5>

            @can('delete', $tweet)
                @component('components.delete-button', ['tweet' => $tweet])
                @endcomponent
            @endcan
        </div>

        <p class="text-sm mb-3">
            {{ $tweet->body }}
        </p>

        @component('components.like-buttons', ['tweet' => $tweet])
        @endcomponent
    </div>
</div>