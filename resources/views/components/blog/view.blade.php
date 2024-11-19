<x-layout>
    <h1 class="mt-20 font-bold uppercase items-center">All Posts in a Table</h1>
    <table class="min-w-full divide-y divide-gray-200 mt-8">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                No.
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                Title
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                Author
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                Category
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                Published On
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach($posts as $index => $post)
            <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}"
                onclick="window.location.href='/blogs/id={{ $post->id }}'" style="cursor:pointer;">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $index + 1 }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-blue-500">
                        <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                        @if($post->isLatest())
                            <sup class="bg-blue-500 text-white text-base/4 px-1 py-0.5 rounded-full">
                                New
                            </sup>
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-blue-500">
                        <a href="/?authors={{ $post->author->name }}">{{ $post->author->name }}</a>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-blue-500">
                        <a href="/?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $post->created_at->format('M d, Y') }}</div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <!-- @foreach($posts as $index => $post)
                <?php
                $rowClass = $index % 2 == 0 ? 'bg-white' : 'bg-gray-100';
                $row      = sprintf(
                    '<tr class="%s" onclick="window.location.href=\'/blogs/id=%d\'" style="cursor:pointer;">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">%d</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-blue-500">
                                <a href="/posts/%s">%s</a>
                                @if($post->isLatest())
                                <sup>New</sup>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-blue-500">
                                <a href="/?authors=%s">%s</a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-blue-500">
                                <a href="/?category=%s&">%s</a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">%s</div>
                        </td>
                    </tr>',
                    $rowClass,
                    $post->id,
                    $index + 1,
                    $post->slug,
                    $post->title,
                    $post->author->name,
                    $post->author->name,
                    $post->category->slug,
                    $post->category->name,
                    $post->created_at->format('M d, Y')
                );
                echo $row;
                ?>
        @endforeach -->
        </tbody>
    </table>
</x-layout>
