<x-app-layout>
    <div class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">

        <h4 class="mb-6 text-xl font-bold text-black dark:text-white">All Products</h4>

        <!-- Search Bar -->
        <form action="{{ route('products.index') }}" method="GET" class="mb-4 flex items-center space-x-2">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by title..."
                class="border px-2 py-1 rounded-md"
            >
            <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">Search</button>
        </form>

        <!-- Table for displaying data -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto rounded-sm dark:bg-meta-4">
                <thead>
                    <tr class="bg-gray-2">
                        <!-- Add sortable headers -->
                        <th class="p-2.5 text-center xl:p-5 cursor-pointer">
                            <a href="{{ route('products.index', array_merge(request()->all(), ['sortField' => 'id', 'sortOrder' => request('sortOrder') === 'asc' ? 'desc' : 'asc'])) }}">
                                #
                            </a>
                        </th>
                        <th class="p-2.5 text-center xl:p-5 cursor-pointer">
                            <a href="{{ route('products.index', array_merge(request()->all(), ['sortField' => 'title', 'sortOrder' => request('sortOrder') === 'asc' ? 'desc' : 'asc'])) }}">
                                Title
                            </a>
                        </th>
                        <th class="p-2.5 text-center xl:p-5 cursor-pointer">
                            <a href="{{ route('products.index', array_merge(request()->all(), ['sortField' => 'brand', 'sortOrder' => request('sortOrder') === 'asc' ? 'desc' : 'asc'])) }}">
                                Brand
                            </a>
                        </th>
                        <th class="p-2.5 text-center xl:p-5 cursor-pointer">
                            <a href="{{ route('products.index', array_merge(request()->all(), ['sortField' => 'category_id', 'sortOrder' => request('sortOrder') === 'asc' ? 'desc' : 'asc'])) }}">
                                Category
                            </a>
                        </th>
                        <th class="p-2.5 text-center xl:p-5 cursor-pointer">
                            <a href="{{ route('products.index', array_merge(request()->all(), ['sortField' => 'in_stock', 'sortOrder' => request('sortOrder') === 'asc' ? 'desc' : 'asc'])) }}">
                                In-Stock
                            </a>
                        </th>
                        <th class="p-2.5 text-center xl:p-5 cursor-pointer">
                            <a href="{{ route('products.index', array_merge(request()->all(), ['sortField' => 'price', 'sortOrder' => request('sortOrder') === 'asc' ? 'desc' : 'asc'])) }}">
                                Price
                            </a>
                        </th>
                        <th class="p-2.5 text-center xl:p-5">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr class="{{ $loop->last ? '' : 'border-b border-stroke dark:border-strokedark' }}">
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">{{ $products->firstItem() + $index }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">{{ $product->title }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">{{ $product->brand }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">{{ $product->category->name }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">{{ $product->in_stock }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5">
                                <p class="font-medium text-black dark:text-white">${{ number_format($product->price, 2) }}</p>
                            </td>
                            <td class="p-2.5 text-center xl:p-5 space-x-3.5 flex">
                                <a class="hover:text-primary" href="{{ route('products.edit', $product->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                                        <path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path>
                                    </svg>
                                </a>
                                <form id="delete-product-{{ $product->id }}-form" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="#" class="hover:text-primary" onclick="event.preventDefault(); document.getElementById('delete-product-{{ $product->id }}-form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
                                        <path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path>
                                        <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
