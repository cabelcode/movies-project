@include('partials.header');
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <main>

                <form action="{{ route('search') }}" method="POST">
                    @csrf
                    <label>Search:</label>
                    <input type="text" name="search"/>
                    <button type="submit">Submit</button>
                </form>

                <div class="movie-container">
                    @foreach ($data as $item)
                        @switch(strtolower($item['Colour']))
                            @case('yellow')
                                <div class="movie-item bg-yellow-600 border-yellow-600 border-solid hover:border-4 hover:bg-transparent">
                                    @break
                            @case('blue')
                                <div class="movie-item bg-blue-600 border-blue-600 border-solid hover:border-4 hover:bg-transparent">
                                @break
                            @case('green')
                                <div class="movie-item bg-green-600 border-green-600 border-solid hover:border-4 hover:bg-transparent">
                                @break
                            @case('red')
                                <div class="movie-item bg-red-600 border-red-600 border-solid hover:border-4 hover:bg-transparent">
                                @break
                            @default
                                <div class="movie-item bg-white border-red-white border-solid hover:border-4 hover:bg-transparent">
                        @endswitch
                            <div class="card">
                                <a href="{{route('movie', ['id' => $item['imdbID']])}}">
                                    <h2 class="title">{{$item['Title']}}</h2>
                                    <p class="year">{{$item['Year']}}</p>
                                    <img src={{$item['Poster']}}/>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
@include('partials.footer')