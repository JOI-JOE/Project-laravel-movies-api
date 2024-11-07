<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public $popularTv;
    public $topRatedTv;
    public $genres;
    public function __construct($popularMovies, $topRatedTv, $genres)
    {
        $this->popularTv = $popularMovies;
        $this->topRatedTv = $topRatedTv;
        $this->genres = $genres;
    }

    public function popularTv()
    {
        return $this->formatTv($this->popularTv);
    }

    public function topRatedTv()
    {
        return $this->formatTv($this->topRatedTv);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    public function formatTv($tv)
    {
        //        @foreach($movie['genre_ids'] as $genre){{$genres->get($genre)}}
        //            @if(!$loop->last), @endif @endforeach
        return collect($tv)->map(function ($tvshow) {
            $genresFormated = collect($tvshow['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(", ");

            return collect($tvshow)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $tvshow['poster_path'],
                'vote_average' => $tvshow['vote_average'] * 10 . '%',
                'first_air_date' => Carbon::parse($tvshow['first_air_date'])->format('M d ,Y'),
                'genres' => $genresFormated,
            ])->only([
                'poster_path',
                'id',
                'genre_ids',
                'name',
                'title',
                'vote_average',
                'overview',
                'first_air_date',
                'genres',
            ]);
        });
    }
}
