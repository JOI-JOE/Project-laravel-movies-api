<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';
    public function render()
    {
        $searchResult = [];

        if(strlen($this->search) >= 2){
            $searchResult = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/movie?query='. $this->search)
                ->json()['results'];
        }

        return view('livewire.search-dropdown',[
            'searchResult' => collect($searchResult)->take(7)
        ]);
    }
}
