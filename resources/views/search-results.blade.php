<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('dashboard') }}" class="text-indigo-600 hover:text-indigo-800 font-medium mb-4 inline-block">← Kembali ke Dashboard</a>
            
            <h3 class="text-2xl font-bold mb-6 text-gray-700">Hasil Pencarian untuk: "<span class="text-indigo-600">{{ $query }}</span>"</h3>
            
            @if(count($searchResults) > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    @foreach($searchResults as $movie)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition flex flex-col justify-between">
                            <a href="{{ route('movie.show', $movie['id']) }}">
                                @if($movie['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-full h-auto">
                                @else
                                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                                @endif
                            </a>
                            <div class="p-4">
                                <h4 class="font-bold text-gray-800 text-sm line-clamp-2 mb-1">{{ $movie['title'] }}</h4>
                                <p class="text-xs text-gray-500">⭐ {{ $movie['vote_average'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">Film yang kamu cari tidak ditemukan.</p>
            @endif
        </div>
    </div>
</x-app-layout>