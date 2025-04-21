@extends("base")
@section("title")
    Public blog
@endsection

@section("nav")
    <x-navbar></x-navbar>
@endsection

@section("body")
    <x-display-blogs :articles="$articles"></x-display-blogs>
@endsection

@section("footer")
    <x-footer></x-footer>
@endsection
