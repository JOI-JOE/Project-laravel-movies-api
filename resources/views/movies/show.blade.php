@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ $movie['poster_path'] }}" alt="parasite" class="w-64 lg:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{$movie['title']}}</h2>
                <div class="flex flex-wrap items-center text-gray-50 text-sm mt-2">
                <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-yellow-600">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                </svg>
                            </span>
                    <span class="ml-1">{{ $movie['vote_average'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['release_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        {{ $movie['genres'] }}
                    </span>
            </div>

                <p class="text-gray-300 mt-8">
                    {{$movie['overview']}}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach($movie['crew'] as $screw)
                            <div class="mr-4">
                                    <div>{{$screw['name']}}</div>
                                    <div class="text-sm text-gray-400">{{$screw['job']}}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div x-data="{isOpen : false}">
                    @if(count($movie['videos']['results']) > 0)
                    <div class="mt-12">
                        <button
                            @click="isOpen = true"
                           class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                            </svg>
                            <span class="ml-2">Play Trailer</span>
                        </button>
                    </div>
                    @endif
                        <div style="background-color: rgb(0,0,0,.5)"
                            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            x-show.transition.opacity="isOpen"
                        >
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button @click="isOpen = false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%;">
                                            <iframe src="https://www.youtube.com/embed/{{$movie['videos']['results'][0]['key']}}"
                                                    width="560" height="315"
                                                    class="responsive-iframe absolute top-0 left-0 w-full h-full"
                                                    style="border: 0;"
                                                    allow="autoplay; encrypted-media"
                                                    allowfullscreen
                                            ></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>  <!-- end movie info --->

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                    @foreach($movie['cast'] as $cast)
                            <div class="mt-8">
                                <a href="{{route('actors.show', $cast['id'])}}">
                                    <img src="{{'https://image.tmdb.org/t/p/w500/'.$cast['profile_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                                <div class="mt-2">
                                    <a href="{{route('actors.show', $cast['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{$cast['name']}}</a>
                                    <div class="flex items-center text-gray-50 text-sm mt-1">
                                        <span> {{$cast['character']}} </span>
                                    </div>
                                </div>
                            </div>
                    @endforeach

            </div>
        </div>
    </div> <!-- End Movie Cast Info -->

    <div class="movie-image" x-data="{isOpen: false, image:''}">
        <div class="border-b border-gray-800">
             <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Image</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  gap-8">
                        @foreach($movie['images'] as $image)
                                <div class="mt-8">
                                    <a
                                        @click.prevent = "
                                            isOpen = true
                                            image  = '{{'https://image.tmdb.org/t/p/original/'.$image['file_path']}}'
                                        "
                                        href="#">
                                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$image['file_path']}}" alt="parasite" class="w-64 lg:w-96">
                                    </a>
                                </div>
                        @endforeach
                    </div>
                 <div style="background-color: rgb(0,0,0,.5)"
                      class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                      x-show="isOpen"
                 >
                     <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                         <div class="bg-gray-900 rounded">
                             <div class="flex justify-end pr-4 pt-2">
                                 <button
                                     @click="isOpen = false"
                                     @keydown.escape.window="isOpen = false"
                                     class="text-3xl leading-none hover:text-gray-300">&times;
                                 </button>
                             </div>
                             <div class="modal-body px-8 py-8">
                                     <img :src="image" alt="poster" >
                             </div>
                         </div>
                     </div>
                 </div>

                </div>
        </div>
    </div>
@endsection
