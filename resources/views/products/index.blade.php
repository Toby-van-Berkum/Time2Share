<x-app-layout>
    <div class="container mx-auto py-8">
      <h1 class="text-2xl font-bold mb-4">Products</h1>
      <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Product</a>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($products as $product)
          <div class="bg-white rounded shadow overflow-hidden flex flex-col h-96">
            <div class="relative flex-grow flex items-center justify-center overflow-hidden">
              <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain">
              <span class="absolute top-0 left-0 bg-blue-500 text-white px-2 py-1 rounded-tl rounded-br text-sm font-bold">{{ $product->name }}</span>
              <span class="absolute top-0 right-0 bg-green-500 text-white px-2 py-1 rounded-tr rounded-bl text-sm font-bold">{{ $product->category->name }}</span>
            </div>
            <div class="p-4">
              <p class="text-xl font-bold mb-2">{{ $product->name }}</p>
              <p class="text-sm text-gray-700 mb-4 break-words">
                {{ Str::limit($product->description, 75, '...') }} </p>
              <a href="{{ route('lendings.create', $product) }}" class="bg-green-500 text-white px-4 py-2 rounded inline-block">Lend</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </x-app-layout>
  