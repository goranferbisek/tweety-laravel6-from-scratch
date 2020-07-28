<div class="border border-blue-400 rounded-lg py-6 px-8 mb-8">
    <form class="form" id="publish-form">
        @csrf

        <textarea
            name="body"
            class="w-full drop-zone boder-solid border-2 border-gray-100"
            placeholder="What's on your mind?"
            required
            autofocus
        ></textarea>
        <div class="text-sm text-center text-gray-600 upload-info">
            drag an image on to the text area
        </div>
        <input type="file" name="image" class="hidden tweet-image">

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="avatar photo"
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
            <div class="flex items-center">
                <div class="mr-4 counter-div hidden">
                    <span class="counter">0</span>/140
                </div>
                <button
                type="submit"
                id="publish"
                class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10"
                >
                Publish
                </button>
            </div>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>