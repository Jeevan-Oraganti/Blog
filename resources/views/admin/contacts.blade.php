<x-layout>
    <h1 class="mt-20 font-bold uppercase items-center">All Contacts</h1>
    <table class="min-w-full divide-y divide-gray-200 mt-8">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                No.
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
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach($contacts as $index => $contact)
                <?php
                $rowClass = $index % 2 == 0 ? 'bg-white' : 'bg-gray-100';
                $row      = sprintf(
                    '<tr class="%s" onclick="window.location.href=\'/contacts/%d\'" style="cursor:pointer;">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">%d</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-blue-500">
                            <a href="mailto:%s">%s</a>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-blue-500">
                            <a href="mailto:%s">%s</a>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-blue-500">
                            <a href="/contacts?subject=%s">%s</a>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-blue-500">
                            <a href="/contacts?subject=%s">%s</a>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">%s</div>
                    </td>
                </tr>',
                    $rowClass,
                    $contact->id,
                    $index + 1,
                    $contact->email,
                    $contact->name,
                    $contact->email,
                    $contact->email,
                    $contact->subject,
                    $contact->subject,
                    $contact->message,
                    $contact->message,
                    $contact->created_at->format('M d, Y')
                );
                echo $row;
                ?>
        @endforeach
        </tbody>
    </table>
</x-layout>
