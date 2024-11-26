<x-layout>
    <h1 class="mt-20 font-bold uppercase text-blue-500 items-center"><a href="/admin/contacts">All Contacts</a></h1>
    <table class="min-w-full divide-y divide-gray-200 mt-8">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                No.
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                Profile
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                Email
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                Subject
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                Message
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                Sent At
            </th>
        </tr>
        </thead>
        @php
            $startingIndex = ($contacts->currentPage() - 1) * $contacts->perPage();
        @endphp
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach($contacts as $index => $contact)
            @php
                $rowClass = $index % 2 == 0 ? 'bg-white' : 'bg-gray-100';
            @endphp
            <tr class="{{ $rowClass }}" onclick="window.location.href='/contacts/{{ $contact->id }}'"
                style="cursor:pointer;">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $startingIndex + $index + 1 }}</div>
                </td>
                <td>
                    <div class="ml-7 flex-shrink-0 whitespace-nowrap">
                        <img src="https://i.pravatar.cc/60?u={{ $contact->id }}" alt="Profile Image" width="40"
                             height="40" class="rounded-full">
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-blue-500">
                        <a href="mailto:{{ $contact->email }}">{{ $contact->name }}</a>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-blue-500">
                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-blue-500">
                        <a href="/contacts?subject={{ $contact->subject }}">{{ $contact->subject }}</a>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-blue-500">
                        <a href="/contacts?subject={{ $contact->subject }}">{{ $contact->message }}
                            @if($contact->isLatest())
                                <sup class="bg-blue-500 text-white text-base/4 px-1 py-0.5 rounded-full">
                                    New
                                </sup>
                            @endif
                        </a>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $contact->created_at->format('h:i A M d, Y') }}</div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $contacts->links() }}
    </div>

</x-layout>
