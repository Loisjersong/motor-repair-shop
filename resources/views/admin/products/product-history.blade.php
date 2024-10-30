<x-app-layout>
    <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <h4 class="mb-6 text-xl font-bold text-black dark:text-white">
            Product History
        </h4>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto rounded-sm dark:bg-meta-4">
                <thead>
                    <tr class="bg-gray-2">
                        <th class="p-2.5 text-center xl:p-5">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">#</h5>
                        </th>
                        <th class="p-2.5 text-center xl:p-5">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">Action</h5>
                        </th>
                        <th class="p-2.5 text-center xl:p-5">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">User</h5>
                        </th>
                        <th class="p-2.5 text-center xl:p-5">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">Title</h5>
                        </th>
                        <th class="p-2.5 text-center xl:p-5">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">Brand</h5>
                        </th>
                        <th class="p-2.5 text-center xl:p-5">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">Category</h5>
                        </th>
                        <th class="p-2.5 text-center xl:p-5">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">In-Stock</h5>
                        </th>
                        <th class="p-2.5 text-center xl:p-5">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">Price</h5>
                        </th>
                        <th class="p-2.5 text-center xl:p-5">
                            <h5 class="text-sm font-medium uppercase xsm:text-base">Timestamp</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productHistories as $index => $history)
                        <tr class="{{ $loop->last ? '' : 'border-b border-stroke dark:border-strokedark' }}">
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">{{ $index + 1 }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">{{ $history->action }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">{{ $history->user }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">{{ $history->title }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">{{ $history->brand }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">{{ $history->category }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">{{ $history->in_stock }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">₱{{ number_format($history->price, 2) }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">{{ $history->created_at }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
