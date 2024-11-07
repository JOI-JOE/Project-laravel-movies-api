    <div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
        <input wire:model.live.debounce.300ms="search" type="text"
               class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
               placeholder="Search"
               x-ref="search"
               @keydown.window="
                  if (event.keyCode === 191) {
                    event.preventDefault();
                    $refs.search.focus();
                  }
                "
               @foucs="isOpen = true"
               @keydown="isOpen = true"
               @keydown.escape.window="isOpen = false"
               @keydown.shift.tab="isOpen = false"
        >
        <div class="absolute top-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="fill-current w-4 text-gray-500 mt-1 ml-3 size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </div>
        <div wire:loading class="spnner top-0 right-0 mr-4 mt-3.5"></div>
        @if(strlen($search) >= 2)
        <div class="absolute bg-gray-800 rounded w-64 mt-4"
             x-show.transition.opacity="isOpen"
        >
            @if($searchResult->count() > 0)
            <ul>
                @foreach($searchResult as $result)
                <li class="border-b border-gray-700">
                    <a
                        href="{{route('movies.show', $result['id'])}}"
                        class="block hover:bg-gray-700 px-3 py-3 flex items-center"
                        @if($loop->last) @keydown.tab.exact="isOpen = false" @endif
                    >
                        @if($result['poster_path'])
                            <img src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" alt="poster" class="w-8">
                        @else
                            <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                        @endif
                        <span class="ml-4">{{$result['title']}}</span>
                    </a>
                </li>
                @endforeach
            </ul>
            @else
                <div class="px-3 py-3">No results for "{{$search}}"</div>
            @endif
        </div>
        @endif


    </div>
