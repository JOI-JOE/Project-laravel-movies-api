@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wide text-orange-500 text-lg font-semibold">Actors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($popularActors as $actor)
               <div class="actor mt-8">
                   <a href="{{route('actors.show', $actor['id'])}}">
                       <img src="{{$actor['profile_path']}}" alt="profile" class="hover:opacity-75 transition ease-in-out duration-150">
                   </a>
                    <div class="mt-2">
                        <a href="{{route('actors.show', $actor['id'])}}" class="text-lg hover:text-gray-300">{{$actor['name']}}</a>
                        <div class="text-sm truncate text-gray-400">{{$actor['known_for']}}</div>
                    </div>
                </div>
                @endforeach
            </div>

        </div> 
        <!-- end popular-actor -->

{{--        <div class="flex justify-between mt-16">--}}
{{--            @if($previous)--}}
{{--                <a href="/actors/page/{{$previous}}">Previous</a>--}}
{{--            @else--}}
{{--                <div></div>--}}
{{--            @endif--}}

{{--                @if($next)--}}
{{--                    <a href="/actors/page/{{$next}}">Next</a>--}}
{{--                @else--}}
{{--                    <div></div>--}}
{{--                @endif--}}
{{--        </div>--}}
        <div class="page-load-status my-8">
            <div class="flex justify-center">
                <div class="infinite-scroll spinner my-8 text-4xl">&nbsp;</div>
            </div>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">No more pages to load</p>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script >
        let elem = document.querySelector('.grid');
        let infScroll = new InfiniteScroll( elem, {
            // options
            path: '/actors/page/@{{#}}',
        // <div class="actor mt-8">
            append: '.actor',
            // history: false,
            status: '.page-load-status'
        });
    </script>
@endsection
