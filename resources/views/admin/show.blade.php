@extends("base")
@section("title")
    Show details page
@endsection

@section("nav")
    <x-navbar></x-navbar>
@endsection

@section("body")
    <div class="container d-flex justify-content-center mt-5">
        <div class="card" style="width: 30rem;">
            <img src="{{ asset('storage/uploads/' . $article->img_path) }}"
                 class="card-img-top" alt="dog">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ $article->body }}</p>

                <div class="d-flex justify-content-left">
                    <a href="{{ route('admin.index') }}" class="btn btn-primary">
                        Back
                    </a>
                    <form method="POST" class="ml-3" action="{{ route('admin.destroy', $article->id) }}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
