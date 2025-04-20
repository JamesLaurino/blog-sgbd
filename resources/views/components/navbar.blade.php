<nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
    <div class="mr-auto">
        <a class="navbar-brand ml-3 text-white" href="">
            <span class="fas fa-book" style="font-size: 1.5rem;"></span>
        </a>
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
                            $name = auth()->user()->name;
                            $firstLetter = strtoupper(substr($name,0,1));
                            $lastLetters = strtoupper(substr($name,-2));
                            $white = "white";
                            $color = substr(hash('sha256', $name),0,6);
                        @endphp
                         <a style="background-color: {{"#" . $color}}"
                            class='nav-link text-dark rounded-circle' href='/dashboard'>
                                    {{$firstLetter . $lastLetters}}
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
