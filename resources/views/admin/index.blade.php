@extends("base")
@section("title")
    Admin page
@endsection

@section("custom-css")
    @vite(['resources/css/materialize-design.css'])
@endsection

@section("nav")
    <x-navbar></x-navbar>
@endsection

@section("body")
    <div class="d-flex container mt-5">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">body</th>
                <th scope="col">path</th>
                <th scope="col">user</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{substr($article->title,1,10)}}</td>
                    <td>{{substr($article->body,1,10)}}</td>
                    <td>{{$article->img_path}}</td>
                    <td>{{$article->user_id}}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.show', $article->id) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('admin.edit', $article->id) }}" class="btn btn-warning">Modifier</a>
{{--                        <form method="POST" action="{{ route('users.destroy', $user->id) }}">--}}
{{--                            @method("DELETE")--}}
{{--                            @csrf--}}
{{--                            <button class="text-yellow-500 ml-2" >Supprimé</button>--}}
{{--                        </form>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5 d-flex justify-content-center">
        {{$articles->links()}}
    </div>
@endsection
