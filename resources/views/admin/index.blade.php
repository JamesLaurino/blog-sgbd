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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5 d-flex justify-content-center">
        {{$articles->links()}}
    </div>
@endsection
