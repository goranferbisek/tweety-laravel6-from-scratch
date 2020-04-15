@component('components.app')
    <div>
        @foreach ($users as $user)
            <img
                src="{{ $user->avatar }}"
                alt="{{ $user->username }} avatar"
                width="60px"
            >
        @endforeach
    </div>
@endcomponent
