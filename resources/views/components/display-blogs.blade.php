@props(["articles", "user", "friends", "myFriends"])

<div class="container d-flex justify-content-right mt-3">
    <div class="shadow p-3">
        <p>{{$user->name}}</p>
        @if(auth()->user()->id != $user->id)
            @if($friends->isEmpty())
                <x-friend-form-add :friendId="$user->id"></x-friend-form-add>
            @else
                <x-friend-form-remove :friendId="$user->id"></x-friend-form-remove>
            @endif

        @else
            <div>
                <p>Amis</p>
                <ul class="list-group list-group-flush">
                    @foreach($myFriends as $friend)
                        @if($friend->friend->id != auth()->user()->id)
                            <a href="{{route('blog.publicPage', $friend->friend->id)}}"
                               class="list-group-item">{{$friend->friend->name}}</a>
                        @endif

                        @if($friend->user->id != auth()->user()->id)
                                <a href="{{route('blog.publicPage', $friend->friend->id)}}"
                                   class="list-group-item">{{$friend->user->name}}</a>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

<div class="container my-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach($articles as $article)
            <div class="col mb-3">
                <div class="card h-100">
                    <img
                        src="{{ asset('storage/uploads/' . $article->img_path) }}"
                        class="card-img-top"
                        alt="Image of {{ $article->title }}"
                        style="height: 200px; object-fit: cover;"
                    >
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->body }}</p>
                        <a href="{{ route('blog.show', $article->id) }}" class="btn btn-primary">
                            En savoir plus ?
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
