<!doctype html>
<html lang="en" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>
    @vite('resources/css/app.css')
    <livewire:styles />
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{route('movies.index')}}">Vito</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{route('movies.index')}}" class="hover:text-gray-300">Movies</a>
                </li> <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{route('tv.index')}}" class="hover:text-gray-300">TV Shows</a>
                </li> <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="{{route('actors.index')}}" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
               <livewire:search-dropdown/>
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="#">
                        <img src="https://milagrosbeautyroom.com/wp-content/uploads/2022/10/z3774782372725_f637f9ab066eedda31006458bab70d01.jpg" alt="" class="rounded-full w-8 h-8">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <livewire:scripts />
@yield('scripts')
</body>
</html>
