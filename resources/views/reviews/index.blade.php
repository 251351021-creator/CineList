<x-app-layout>

    <div class="max-w-7xl mx-auto py-8">

        <h1 class="text-3xl font-bold mb-6">
            ⭐ My Reviews
        </h1>

        {{-- Form Tambah Review --}}
        <div class="bg-white p-6 rounded-xl shadow mb-6">

            <form action="{{ route('reviews.store') }}" method="POST">

                @csrf

                <div class="mb-4">
                    <label class="block font-semibold">
                        Movie ID
                    </label>

                    <input
                        type="number"
                        name="movie_id"
                        class="w-full border rounded p-2"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">
                        Rating (1-5)
                    </label>

                    <input
                        type="number"
                        min="1"
                        max="5"
                        name="rating"
                        class="w-full border rounded p-2"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold">
                        Review
                    </label>

                    <textarea
                        name="review"
                        rows="4"
                        class="w-full border rounded p-2"
                        required></textarea>
                </div>

                <button
                    class="bg-blue-500 text-black px-4 py-2 rounded">
                    Simpan Review
                </button>

            </form>

        </div>

        {{-- List Review --}}
        @forelse($reviews as $item)

            <div class="bg-white p-6 rounded-xl shadow mb-4">

                <p class="font-bold">
                    Movie ID: {{ $item->movie_id }}
                </p>

                <p class="text-yellow-500">
                    Rating: {{ $item->rating }}/5
                </p>

                <p class="mt-2">
                    {{ $item->review }}
                </p>

                <form
                    action="{{ route('reviews.destroy', $item->id) }}"
                    method="POST"
                    class="mt-3">

                    @csrf
                    @method('DELETE')

                    <button
                        class="bg-red-500 text-black px-3 py-2 rounded">
                        Hapus
                    </button>

                </form>

            </div>

        @empty

            <p>Belum ada review.</p>

        @endforelse

    </div>

</x-app-layout>