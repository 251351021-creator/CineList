<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 

class MovieController extends Controller
{
    /**
     * Langkah 3: Menampilkan Kategori Tren (Halaman Utama / Dashboard)
     */
    public function index()
    {
        $response = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/trending/movie/day')
            ->json();

        $trendingMovies = $response['results'] ?? [];

        return view('dashboard', compact('trendingMovies'));
    }

    /**
     * Langkah 4: Fitur Pencarian Film (Search)
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $searchResults = [];

        if ($query) {
            $response = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/movie', [
                    'query' => $query
                ])->json();

            $searchResults = $response['results'] ?? [];
        }

        return view('search-results', compact('searchResults', 'query'));
    }

    /**
     * Langkah 5: Halaman Detail Film (Sinopsis & Daftar Pemain)
     */
    public function show($id)
    {
        $movieResponse = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/movie/{$id}")
            ->json();

        $creditsResponse = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/movie/{$id}/credits")
            ->json();

        $movie = $movieResponse;
        
        $actors = array_slice($creditsResponse['cast'] ?? [], 0, 5);

        return view('movie-detail', compact('movie', 'actors'));
    }
}