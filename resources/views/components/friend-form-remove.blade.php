@props(["friendId"])

<form method="POST" action="{{route('friend.destroy')}}">
    @csrf
    @method("DELETE")
    <input type="hidden" value="{{ $friendId }}" name="friend_id">
    <button type="submit" class="btn btn-warning">Se désabonner</button>
</form>
