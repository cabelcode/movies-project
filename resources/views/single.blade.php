@include('partials.header')

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


@include('partials.footer')