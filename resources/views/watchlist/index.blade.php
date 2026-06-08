<x-app-layout>

    <div class="max-w-7xl mx-auto py-8">

        <h1 class="text-3xl font-bold mb-6">
            🎬 My Watchlist
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @forelse($watchlists as $movie)

                <div class="bg-white rounded-xl shadow">

                    @if($movie->poster)
                        <img
                            src="{{ $movie->poster }}"
                            class="w-full h-80 object-cover rounded-t-xl"
                        >
                    @endif

                    <div class="p-4">

                        <h2 class="font-bold text-lg">
                            {{ $movie->title }}
                        </h2>

                        <form
                            action="{{ route('watchlist.destroy',$movie->id) }}"
                            method="POST"
                            class="mt-3"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                class="bg-red-500 text-black px-4 py-2 rounded"
                            >
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <p>
                    Belum ada film dalam watchlist.
                </p>

            @endforelse

        </div>

    </div>

</x-app-layout>