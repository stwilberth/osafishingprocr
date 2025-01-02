{{-- form to filter the products by category, brand and price --}}
<div class="container mx-auto lg:w-3/6 sm:w-full">
    <form action="{{ route('products.index') }}" method="GET"
        class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2 sm:w-full w-50 p-2">
        <select name="category" class="border border-gray-300 rounded-md w-full">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <select name="brand" class="border border-gray-300 rounded-md w-full">
            <option value="">Select Brand</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                    {{ $brand->name }}
                </option>
            @endforeach
        </select>

        {{-- <select name="price_order" class="border border-gray-300 rounded-md p-2 w-full">
        <option value="asc" {{ request('price_order') == 'asc' ? 'selected' : '' }}>Mayor a Menor</option>
        <option value="desc" {{ request('price_order') == 'desc' ? 'selected' : '' }}>Menor a Mayor</option>
    </select> --}}

        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full sm:w-auto">
            Filter
        </button>
    </form>
</div>
