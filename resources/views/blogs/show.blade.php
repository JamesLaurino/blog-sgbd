@extends("base")
@section("title")
    Show details page
@endsection

@section("custom-css")
    @vite(['resources/css/animation-star.css'])
@endsection

@section("nav")
    <x-navbar></x-navbar>
@endsection

@section("body")
    <div class="container d-flex justify-content-center mt-5">
        <div class="card" style="width: 30rem;">
            <img src="{{ asset('storage/uploads/' . $article->img_path) }}"
                 class="card-img-top" alt="dog">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}"</h5>
                <p class="card-text">{{ $article->body }}</p>
                <div class="container d-flex justify-content-between">
                    <a href="{{ route('blog.index') }}" class="btn btn-primary">
                        back
                    </a>
                    <x-star-logic :articleId="$article->id"></x-star-logic>
                </div>
            </div>

            @foreach($article->comments as $comment)
                <div class="m-3 p-3 shadow">
                    <p>{{$comment->body}}</p>
                </div>
            @endforeach

        </div>

        <div class="ml-5">
            <form method="POST" action="{{route('comment.create')}}"
                  class="form shadow p-4">
                @csrf
                <div class="form-group">
                    <label for="body">Votre commentaire</label>
                    <textarea class="form-control"
                              name="body"
                              id="body"
                              cols="30"
                              rows="5"></textarea>
                </div>
                <input type="hidden" id="postId" name="id" value="{{$article->id}}" />
                <button class="btn btn-dark text-white mt-3"
                        type="submit">Poster</button>
            </form>

            <div class="h5 mt-3">Rating des Clients</div>
            @foreach ($stars as $star)
                <div class="shadow p-3 mt-3">
                    <span>{{ $star->user->name }}</span>
                    <span style="font-size: 2rem; color: gold;">
                    @for ($i = 1; $i <= 5; $i++)
                            @if($i <= $star->quantity)
                                <span data-value="{{ $i }}">
                               {{ '★' }}
                            </span>
                            @else
                                <span data-value="{{ $i }}">
                                 {{ '☆' }}
                            </span>
                            @endif
                        @endfor
                </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection
