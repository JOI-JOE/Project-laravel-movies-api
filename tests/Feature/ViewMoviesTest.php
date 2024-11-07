<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewMoviesTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function the_main_page_shows_correct_info(): void
    {
//        Http::fake([
//            'https://api.themoviedb.org/3/movie/popular' =>
//                $this->fakePopularMovies(),
//        ]);
//        $response = $this->get(route('/movies.index'));
//
//        $response->assertSuccessful();
//        $response->assertSee('Popular movies');
    }

//    private function fakePopularMovies()
//    {
//        return Http::response([
//            'result' => [
//
//            ]
//        ],200);
//    }
}
