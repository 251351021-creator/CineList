<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard CineList') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('movie.search') }}" method="GET" class="mb-8 flex gap-2">
                        <input type="text" name="query" placeholder="Cari film favoritmu di sini..." 
                               class="w-full md:w-1/3 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg transition font-medium">
                            Cari
                        </button>
                    </form>

                    <hr class="border-gray-200 mb-8">

                    <h3 class="text-2xl font-bold mb-6 text-gray-700">Film Populer Hari Ini</h3>
                    
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                        @foreach($trendingMovies as $movie)
                            <div class="bg-gray-50 border border-gray-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300 flex flex-col justify-between">
                                
                                <a href="{{ route('movie.show', $movie['id']) }}">
                                    @if($movie['poster_path'])
                                        <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-full h-auto hover:opacity-90 transition">
                                    @else
                                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-400 text-xs">Tidak ada gambar</div>
                                    @endif
                                </a>

                                <div class="p-4 flex-grow flex flex-col justify-between">
                                    <h4 class="font-bold text-gray-800 text-sm line-clamp-2 mb-1">{{ $movie['title'] }}</h4>
                                    <p class="text-xs text-gray-500">⭐ {{ number_format($movie['vote_average'], 1) }} | {{ substr($movie['release_date'] ?? '----', 0, 4) }}</p>
                                </div>

                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</x-app-layout>  
