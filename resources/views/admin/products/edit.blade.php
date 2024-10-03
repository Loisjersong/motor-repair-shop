<x-app-layout>
    <div class="flex justify-center items-center">
        <div class="w-full max-w-md">
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                    <h3 class="font-medium text-black dark:text-white">
                        Add Product
                    </h3>
                </div>

                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-6.5">
                        <div class="mb-4.5">
                            <x-form-label> Product Title </x-form-label>
                            <x-form-input type="text" name="title" value="{{ $product->title }}" required/>

                            <x-form-label> Brand</x-form-label>
                            <x-form-input type="text" name="brand" value="{{ $product->brand }}" required/>

                            <x-form-label> Category </x-form-label>

                            <x-form-select name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" class="text-body" @if ($category->id === $product->category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </x-form-select>

                            <x-form-label> In-Stock</x-form-label>
                            <x-form-input type="number" name="in_stock" value="{{ $product->in_stock }}" required/>

                            <x-form-label> Price</x-form-label>
                            <x-form-input type="text" name="price" value="{{ $product->price }}" required/>

                            <x-form-label> Photo *</x-form-label>
                            <x-form-input-file name="photo"/>
                        </div>

                        <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90">
                            Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
