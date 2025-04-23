<nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
    <div class="mr-auto">
        <a class="navbar-brand ml-3 text-white" href="{{ route('blog.index')}}">
            <span class="fas fa-book" style="font-size: 1.5rem;"></span>
        </a>
    </div>
    <div class="mr-auto">
        @auth
            <a class="ml-2 text-white" href="{{ route('blog.publicPage', Auth::id())}}">
                <span class="fas fa-user" style="font-size: 1.5rem;"></span>
            </a>
        @endauth
    </div>

    <div class="d-flex justify-content-center w-100 ml-5 text-white">
        <span class="h3 mr-3">Mon blog</span>
    </div>

    @auth
        @if(auth()->user()->img_avatar)
            <div class="my-2 my-lg-0 mr-5">
                <a class="nav-link text-white" href="/dashboard">
                    <img width="50px" class="rounded-circle" height="50px" src="{{ asset('storage/uploads/' . auth()->user()->img_avatar) }}" />
                </a>
            </div>
            @else
                <div class="my-2 my-lg-0 mr-5">
                    @php
                        $trigram = \App\Helpers\TrigramHelper::toTrigram(auth()->user()->name);
                    @endphp

                    <a href="/dashboard"
                       class="nav-link text-dark rounded-circle d-flex justify-content-center align-items-center"
                       style="background-color: {{"#" . $trigram['color'] }}; width: 40px; height: 40px;">
                        {{ $trigram['firstLetter'] . $trigram['lastLetters'] }}
                    </a>
                </div>
        @endif
    @endauth
    @guest
        <div class="my-2 my-lg-0 mr-5">
            <a class="nav-link text-white" href="/login">connexion</a>
        </div>
    @endguest
</nav>
