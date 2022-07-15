@include('partials.header')

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
@include('partials.footer')