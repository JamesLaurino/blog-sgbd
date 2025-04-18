@extends("base")
@section("title")
    Show details page
@endsection

@section("nav")
    <x-navbar></x-navbar>
@endsection

@section("body")
    <div class="d-flex justify-content-center mt-5 mb-3">
        <p class="h3">Formulaire de modification d'un article</p>
    </div>
    <div class="container d-flex justify-content-center mt-5">
        <form method="POST" action="{{route('admin.update')}}"
              enctype="multipart/form-data"
              class="form shadow p-4">
            @method('PUT')
            @csrf
            <div class="form-group mr-4">
                <span class="input-field" style="max-width: 250px">
                    <input type="text" id="title" value="{{ $article->title }}" name="title" required>
                    <label for="title">Titre</label>
                </span>
            </div>
            <input type="hidden" id="postId" name="id" value="{{$article->id}}" />
            <div class="form-group">
                <label for="body">Contenu</label>
                <textarea class="form-control" name="body"
                          id="body" rows="3">
                    {{ $article->body }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="dog">Image</label>
                <input type="file" name="img_path" class="form-control-file" id="dog">
            </div>
            <button class="btn btn-dark text-white mt-3" type="submit">Editer</button>
            <a href="{{ route('admin.index') }}" class="btn btn-dark mt-3">
                back
            </a>
        </form>
        <div class="m-5">
            <img width="250px" height="250px" src="{{ asset('storage/uploads/' . $article->img_path) }}" class="card-img-top" alt="dog">
        </div>
    </div>
@endsection
