<!-- resources/views/profile/edit.blade.php -->
<x-layout>
    <h1 class="mt-20 uppercase font-bold">Edit Profile</h1>
            <div class="mb-4">
                <a href="{{ url()->previous() }}" class="inline-flex items-center hover:text-blue-600">
                    <svg class="h-6 w-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span class="text-blue-500">Back</span>
                </a>
                <img src="{{ asset('images/edit.svg') }}" class=" w-8 h-8 float-right">
            </div>

            <form method="POST" action="/profile/{{ $user->id }}" enctype="multipart/form-data" class="mt-6">
                @csrf
                @method('PATCH')
                <x-form.input name="name" :value="old('name', $user->name)" />
                <x-form.input name="username" :value="old('username', $user->username)" />
                <x-form.input name="email" :value="old('email', $user->email)" />
                <x-form.input name="profile" type="file" :value="old('profile', $user->profile)" />
                @if ($user->profile)
                <img src="{{ asset('storage/' . $user->profile) }}" alt="profile" class="mt-4 w-16 h-16 rounded-full">
                @endif
                <x-form.field>
                    <x-form.label name="password" />
                    <input type="password" name="password" id="password" class="border border-gray-200 p-2 w-full" value="">
                    <x-form.error name="password" />
                </x-form.field>
                <x-form.field>
                    <x-form.label name="password_confirmation" />
                    <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-200 p-2 w-full" value="">
                    <x-form.error name="password_confirmation" />
                </x-form.field>

                <x-form.button>Update</x-form.button>
            </form>
    </x-layout>