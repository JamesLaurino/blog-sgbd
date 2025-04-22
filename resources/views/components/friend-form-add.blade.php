@props(["friendId"])

<form method="POST" action="{{route('friend.store')}}">
    @csrf
    <input type="hidden" value="{{ $friendId }}" name="friend_id">
    <button type="submit" class="btn btn-dark">Devenir amis</button>
</form>
