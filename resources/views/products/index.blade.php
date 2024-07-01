@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Products</h1>
    <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Product</a>
    <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($products as $product)
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <a href="{{ route('lendings.create', $product) }}" class="bg-green-500 text-white px-4 py-2 rounded mt-2 inline-block">Lend</a>
            </div>
        @endforeach
    </div>
</div>
@endsection