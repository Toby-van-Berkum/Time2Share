<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Lend {{ $product->name }}</h1>
        <form action="{{ route('lendings.store', $product) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="borrower_id" class="block text-gray-700">Borrower</label>
                <select name="borrower_id" id="borrower_id" class="w-full px-4 py-2 border rounded" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="start_date" class="block text-gray-700">Start Date</label>
                <input type="datetime-local" name="start_date" id="start_date" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="end_date" class="block text-gray-700">End Date</label>
                <input type="datetime-local" name="end_date" id="end_date" class="w-full px-4 py-2 border rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Lend</button>
        </form>
    </div>
</x-app-layout>