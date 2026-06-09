<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('dashboard') }}" class="text-indigo-600 hover:text-indigo-800 font-medium mb-4 inline-block">← Kembali</a>
            
            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 flex flex-col md:flex-row gap-8">
                <div class="w-full md:w-1/3 flex-shrink-0">
                    <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" class="rounded-xl shadow-lg w-full">
                </div>
                
                <div class="w-full md:w-2/3">
                    <h1 class="text-3xl font-extrabold text-gray-900">{{ $movie['title'] }}</h1>
                    <p class="text-sm text-gray-500 mt-2">Rilis: {{ $movie['release_date'] }} | ⭐ {{ $movie['vote_average'] }} / 10</p>
                    
                    <h2 class="text-xl font-bold text-gray-800 mt-6 mb-2">Sinopsis</h2>
                    <p class="text-gray-600 text-justify leading-relaxed">{{ $movie['overview'] ?? 'Sinopsis tidak tersedia untuk film ini.' }}</p>
                    
                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <span class="text-xs text-gray-400 block mb-2">[Fitur Tambah Watchlist & Rating Toko oleh Mhs 1]</span>
                    </div>
                </div>
            </div>

            <div class="mt-12 bg-white rounded-2xl shadow-md p-6 md:p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Pemain Utama</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6">
                    @foreach($actors as $actor)
                        <div class="text-center">
                            @if($actor['profile_path'])
                                <img src="https://image.tmdb.org/t/p/w185/{{ $actor['profile_path'] }}" class="w-24 h-24 rounded-full mx-auto object-cover shadow-sm">
                            @else
                                <div class="w-24 h-24 rounded-full bg-gray-200 mx-auto flex items-center justify-center text-xs text-gray-400">No Photo</div>
                            @endif
                            <h4 class="font-bold text-gray-800 text-sm mt-3">{{ $actor['name'] }}</h4>
                            <p class="text-xs text-gray-500">{{ $actor['character'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>