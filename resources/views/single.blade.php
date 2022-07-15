@include('partials.header');

<body class="antialiased">
    <div class="bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
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

        <div class="single-movie-container">
            <div class="movie-info">
                <div class="title">
                    <div>Tilte:</div>
                    <div>{{$data['Title']}}</div>
                </div>
                <div class="year">
                    <div>Year:</div>
                    <div>{{$data['Year']}}</div>
                </div>
                <div class="genre">
                    <div>Genre:</div>
                    <div>{{$data['Genre']}}</div>
                </div>
                <div class="runtime">
                    <div>Runtime:</div>
                    <div>{{$data['Runtime']}}</div>
                </div>
                <div class="writer">
                    <div>Writer:</div>
                    <div>{{$data['Writer']}}</div>
                </div>
                <div class="plot">
                    <div>Plot:</div>
                    <div>{{$data['Plot']}}</div>
                </div>
            </div>
            <div class="movie-poster">
                <img src="{{$data['Poster']}}"/>
            </div>
        </div>


        @auth
        <form class="comments-form" action="{{ route('comments.store') }}" method="POST">
            @csrf
            <label>Add a Comment</label>
            <textarea name="commentInput" rows="4"></textarea>
            <input type="hidden" name="movieId" value="{{$data['imdbID']}}">
            <button class="comment-submit" type="submit">Submit</button>
        </form>
        @endauth

        <ul class="comments-container">

            @foreach ($comments as $comment)
            <li class="comments-item">
                <div class="comment">{{$comment['comment']}}</div>    
                <div class="user">{{$comment['user']}}</div>    
                <div class="createdAt">{{$comment['created_at']}}</div>    
            </li>
            @endforeach

            
        </ul>

    </div>

@include('partials.footer');