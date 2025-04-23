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
    <div class="d-flex justify-content-center mt-5 mb-3">
        <p class="h3">Formulaire d'ajout d'un article</p>
    </div>
    <div class="container d-flex justify-content-center mt-5">
        <form method="POST" action="{{route('blog.store')}}"
              enctype="multipart/form-data"
              class="form shadow p-4">
            @csrf
            <div class="form-group mr-4">
                <span class="input-field" style="max-width: 250px">
                    <input type="text" id="title" name="title" required>
                    <label for="title">Titre</label>
                </span>
                @error("title")
                {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="body">Contenu</label>
                <textarea class="form-control" name="body"
                          id="body" rows="3">
                </textarea>
                @error("body")
                {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="dog">Image</label>
                <input type="file" name="img_path" class="form-control-file" id="dog">
            </div>
            <button class="btn btn-dark text-white mt-3" type="submit">Ajouter</button>
            <a href="{{route("blog.index")}}" class="btn btn-dark text-white mt-3">Retour</a>
        </form>
    </div>
@endsection
