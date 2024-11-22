<x-layout>
    <x-setting :heading="'Edit User: ' . $user->name">
        <a href="/admin/users"
            class="transition-colors duration-300 relative inline-flex items-center text-blue-500 hover:text-blue-600">
            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-1">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                    <path class="fill-current"
                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>
            Back to Users
        </a>
        <img src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png" class="w-8 h-8 float-right">
        <form method="POST" action="/admin/users/{{ $user->id }}" class="mt-6">
            @csrf
            @method('PATCH')
            <x-form.input name="name" :value="old('name', $user->name)" />
            <x-form.input name="username" :value="old('username', $user->username)" />
            <x-form.input name="email" :value="old('email', $user->email)" />
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
    </x-setting>
</x-layout>
