@extends("base")
@section("title")
    Accueil blog
@endsection

@section("nav")
    <x-navbar></x-navbar>
@endsection

@section("body")
    <x-card-blog :articles="$articles" ></x-card-blog>
@endsection


@section("footer")
    <x-footer></x-footer>
@endsection
