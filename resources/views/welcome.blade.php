<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex-center position-ref full-height">
        @if(Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{route('/home')}}">Home</a>
                @else
                    <a href="{{route('/home')}}">Login</a>
                    @if(Route::has('register'))
                        <a href="{{route('/register')}}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="content">
            <div class="title m-b-md bg-blue-500">
                Laravel
            </div>
        </div>

    </div>
</body>
</html>
