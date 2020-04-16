@component('components.master')
<div class="container mx-auto flex justify-center ">
    <div class="px-12 py-8 bg-gray-200 border border-gray-300 rounded-lg">
        <div class="col-md-8">
            <div class="card">
                <div class="font-bold text-lg mb-4">{{ __('Login') }}</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-6">
                            <label
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                for="email"
                            >
                                Email
                            </label>

                            <input
                                class="border border-gray-400 p-2 w-full"
                                type="email"
                                name="email"
                                id="email"
                                autocomplete="email"
                                value="{{ old('email') }}"
                            >

                            @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                for="password"
                            >
                                Password
                            </label>

                            <input
                                class="border border-gray-400 p-2 w-full"
                                type="password"
                                name="password"
                                id="password"
                                autocomplete="current-password"
                            >

                            @error('password')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <div>
                                <input
                                    type="checkbox"
                                    class="mr-1"
                                    name="remember"
                                    id="remember"
                                    {{ old('remember') ? 'checked' : '' }}
                                >

                                <label
                                    class="text-xs text-gray-700 font-bold uppercase"
                                    for="remember"
                                >
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <div>
                            <button
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2"
                                type="submit"
                            >
                                Submit
                            </button>

                            <a
                                href="{{ route('password.request') }}"
                                class="text-xs text-gray-700"
                            >
                                Forgot your password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent
