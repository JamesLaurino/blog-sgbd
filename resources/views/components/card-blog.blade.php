@props(["articles"])

<div class="container mt-5 d-flex justify-content-center align-items-center flex-column">
    @foreach($articles as $article)
        <div class="card shadow h-50 w-25 m-3">
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
    @endforeach
</div>
