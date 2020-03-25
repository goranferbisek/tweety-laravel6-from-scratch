@extends('layouts.app')

@section('content')
    <div class="lg:flex">
        <div class="lg:w-1/6">
            @include ('_sidebar-links')
        </div>

        <div class="lg:flex-1 lg:mx-10">
            @include ('_publish-tweet-panel')

            <div class="border border-gray-300 rounded-lg">
                <div class="flex p-4">
                    <div class="mr-2 flex-shrink-0">
                        <img src="https://i.pravatar.cc/50"
                            alt=""
                            class="rounded-full mr-2">
                    </div>
                    <div>
                        <h5 class="text-bold mb-4">Jon Doe</h5>
                        <p class="text-small">
                            Lorem ipsum dolor sit amet consectetur adipisicing
                             elit. Tempore ratione vitae numquam, ipsa
                              reprehenderit sapiente unde qui consequuntur cum.
                               Vel.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:w-1/6">
            @include ('_friends-list')
        </div>
    </div>
@endsection
