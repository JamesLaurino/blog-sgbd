<nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
    <div class="mr-auto">
        <a class="navbar-brand ml-3 text-white" href="">
            <span class="fas fa-book" style="font-size: 1.5rem;"></span>
        </a>
    </div>

    <div class="d-flex justify-content-center w-100 ml-5 text-white">
        <span class="h3 mr-3">Mon blog</span>
    </div>

    @if(auth()->user()->img_avatar)
        <div class="my-2 my-lg-0 mr-5">
            <a class="nav-link text-white" href="/dashboard">
                <img width="50px" height="50px" src="{{ asset('storage/uploads/' . auth()->user()->img_avatar) }}" />
            </a>
        </div>
        @else
        <div class="my-2 my-lg-0 mr-5">
            <a class="nav-link text-white" href="/dashboard">Dashbord</a>
        </div>
    @endif

    @guest
        <div class="my-2 my-lg-0 mr-5">
            <a class="nav-link text-white" href="/login">connexion</a>
        </div>
    @endguest
</nav>
