@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{$actor['profile_path']}}" alt="profile_image" class="w-64 lg:w-96">
                <ul class="flex items-center mt-4">
                    <li>
{{--                        @if($social['homepage'])--}}
{{--                            <a href="{{$actor['homepage']}}" title="facebook">Facebook</a>--}}
{{--                        @endif--}}

                        @if($social['instagram'])
                                <a href="#" title="instagram">Inst</a>
                        @endif

                        @if($social['twitter'])
                                <a href="#" title="twitter">Twitter</a>
                        @endif
                    </li>
                </ul>
            </div>

            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $actor['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-50 text-sm mt-2">
                <span class="icon">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.871c1.355 0 2.697.056 4.024.166C17.155 8.51 18 9.473 18 10.608v2.513M15 8.25v-1.5m-6 1.5v-1.5m12 9.75-1.5.75a3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0L3 16.5m15-3.379a48.474 48.474 0 0 0-6-.371c-2.032 0-4.034.126-6 .371m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.169c0 .621-.504 1.125-1.125 1.125H4.125A1.125 1.125 0 0 1 3 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 0 1 6 13.12M12.265 3.11a.375.375 0 1 1-.53 0L12 2.845l.265.265Zm-3 0a.375.375 0 1 1-.53 0L9 2.845l.265.265Zm6 0a.375.375 0 1 1-.53 0L15 2.845l.265.265Z" />
                 </svg>
                </span>
                    <span class="ml-1">{{$actor['birthday']}} ({{$actor['age']}} years old) in {{$actor['place_of_birth']}}</span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{$actor['biography']}}
                </p>

                <h4 class="font-semibold mt-12">Known For</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    @foreach($knownForMovies as $movie)
                    <div class="mt-4">
                        <a href="{{$movie['linkToPage']}}">
                            <img src="{{$movie['poster_path']}}" alt="poster"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <a href="{{$movie['linkToPage']}}" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">
                            {{$movie['title']}}
                        </a>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>  <!-- end movie info --->

    <div class="credits border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>
            <ul class="list-disc leading-loose pl-5 mt-8">
                @foreach($credits as $credit)
                    <li>{{$credit['release_year']}} &middot;  <strong>{{$credit['title']}}</strong> as {{$credit['character']}}</li>
                @endforeach
            </ul>
        </div>
    </div> <!-- End Credits Cast Info -->


@endsection
