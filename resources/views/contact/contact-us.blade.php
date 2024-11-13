<x-layout>
    <section class="px-6 py-8 mt-8">
        <h1 class="text-center font-bold text-xl">Contact Us</h1>
        <main class="max-w-lg mx-auto border border-gray-200 bg-gray-100 p-6 rounded-xl mt-6">
            <form method="POST" action="/contact" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Your Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ auth()->check() ? auth()->user()->name : old('email') }}"
                        required
                        class="border border-gray-400 p-2 w-full rounded"
                        {{ auth()->check() ? 'readonly' : '' }}
                    >
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Your Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                        required
                        class="border border-gray-400 p-2 w-full rounded"
                        {{ auth()->check() ? 'readonly' : '' }}
                    >
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="subject" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Subject
                    </label>
                    <input
                        type="text"
                        name="subject"
                        id="subject"
                        value="{{ old('subject') }}"
                        required
                        class="border border-gray-400 p-2 w-full rounded"
                    >
                    @error('subject')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="message" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Your Message
                    </label>
                    <textarea
                        name="message"
                        id="message"
                        rows="5"
                        required
                        class="border border-gray-400 p-2 w-full rounded"
                    >{{ old('message') }}</textarea>
                    @error('message')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-500 text-white rounded py-2 px-4 w-full hover:bg-blue-400 transition duration-200">
                        Send Message
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
