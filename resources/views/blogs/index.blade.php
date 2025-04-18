@extends("base")
@section("title")
    Mon titre
@endsection

@section("nav")
    <x-navbar></x-navbar>
@endsection

@section("body")

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


@endsection
