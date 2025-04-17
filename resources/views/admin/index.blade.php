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
    <div class="container d-flex justify-content-center mt-5">
        <form method="POST" class="form-inline shadow p-4">
            @csrf
            <div class="form-group mr-4">
                <span class="input-field" style="max-width: 250px">
                    <input type="text" id="title" name="title" required>
                    <label for="title">Nom</label>
                </span>
            </div>
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-dark text-white mt-3" type="submit">Ajouter</button>
        </form>
    </div>
@endsection
