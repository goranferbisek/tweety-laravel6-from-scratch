@component('components.app')
    <div>
        @foreach ($users as $user)
            <a href="{{ $user->path() }}" class="flex items-center mb-5">
                <img
                    src="{{ $user->avatar }}"
                    alt="{{ $user->username }} avatar"
                    width="60px"
                    class="m-4 rounded"
                >
                <div>
                    <h4 class="font-bold">{{ '@' . $user->username }}</h4>
                </div>
            </a>
        @endforeach

        {{ $users->links() }}
    </div>
@endcomponent
