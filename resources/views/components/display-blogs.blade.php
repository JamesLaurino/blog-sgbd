@props(["articles", "user", "friends", "myFriends"])

<div class="container d-flex justify-content-right mt-3">
    <div class="shadow p-3">
        <p>User : <strong>{{$user->name}}</strong></p>
        @if(auth()->user()->id != $user->id)
            @if($friends->isEmpty())
                <x-friend-form-add :friendId="$user->id"></x-friend-form-add>
            @else
                <x-friend-form-remove :friendId="$user->id"></x-friend-form-remove>
            @endif

        @else
            <div>
                <p> - Amis</p>
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
                <div>
                    <a class="text-dark" href="{{route("admin.create")}}">
                        <strong>Ajouter un post</strong>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<x-card-blog :articles="$articles" ></x-card-blog>
