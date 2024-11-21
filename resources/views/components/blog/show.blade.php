<x-layout>
    <h1 class="mt-20 font-bold uppercase items-center">Post of the ID</h1>
    <table class="min-w-full divide-y divide-gray-200 mt-8">
        <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                ID.
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

                <?php
                $rowClass = $post->id + 1 % 2 == 0 ? 'bg-white' : 'bg-gray-100';
                $row      = sprintf(
                    '<tr class="%s" onclick="window.location.href=\'/blog?id=%d\'" style="cursor:pointer;">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">%d</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-blue-500">
                                <a href="/posts/%s">%s</a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-blue-500">
                                <a href="/?author=%s">%s</a>
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
                    $post->id,
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
        </tbody>
    </table>
    <nav class="mt-6">
        <a href="/blogs" class="text-blue-500">Blogs<sup>All</sup></a>
    </nav>
</x-layout>
