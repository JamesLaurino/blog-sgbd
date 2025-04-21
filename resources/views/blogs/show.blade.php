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
                <h5 class="card-title">{{ $article->title }}"</h5>
                <p class="card-text">{{ $article->body }}</p>
                <div class="container d-flex justify-content-between">
                    <a href="{{ route('blog.index') }}" class="btn btn-primary">
                        back
                    </a>
                    @auth
                        @if(Auth::user()->starForArticle($article->id))
                            <div id="star-rated" style="font-size: 2rem; color: gold;">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if($i <= Auth::user()->starQuantityForArticle($article->id))
                                        <span>
                                            {{ '★' }}
                                        </span>
                                    @else
                                        <span>
                                            {{ '☆' }}
                                        </span>
                                    @endif
                                @endfor
                            </div>
                        @else
                            <form id="rating-form" action="{{route("rating.store")}}" method="POST">
                                @csrf
                                <input type="hidden" name="article_id" value="{{ $article->id }}">
                                <input type="hidden" name="quantity" id="rating-input">

                                <div id="star-rating" style="cursor: pointer; font-size: 2rem; color: gold;">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star" data-value="{{ $i }}">
                                        {{ '☆' }}
                                    </span>
                                    @endfor
                                </div>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>

            @foreach($article->comments as $comment)
                <div class="m-3 p-3 shadow">
                    <p>{{$comment->body}}</p>
                </div>
            @endforeach

        </div>

        <div class="ml-5">
            <form method="POST" action="{{route('comment.create')}}"
                  class="form shadow p-4">
                @csrf
                <div class="form-group">
                    <label for="body">Votre commentaire</label>
                    <textarea class="form-control"
                              name="body"
                              id="body"
                              cols="30"
                              rows="5"></textarea>
                </div>
                <input type="hidden" id="postId" name="id" value="{{$article->id}}" />
                <button class="btn btn-dark text-white mt-3"
                        type="submit">Poster</button>
            </form>
            <p>TODO => Afficher la liste des ratings par user</p>
        </div>
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll(".star");
        const ratingInput = document.getElementById("rating-input");
        let selectedRating = parseInt(ratingInput.value) || 0;

        function updateStars(rating) {
            stars.forEach(function (star) {
                const starValue = parseInt(star.dataset.value);
                star.textContent = starValue <= rating ? "★" : "☆";
            });
        }

        stars.forEach(function (star) {
            const starValue = parseInt(star.dataset.value);

            // Hover effect
            star.addEventListener("mouseover", function () {
                updateStars(starValue);
            });

            // Remove hover effect when mouse leaves the area
            star.addEventListener("mouseout", function () {
                updateStars(selectedRating);
            });

            // Click to select rating
            star.addEventListener("click", function () {
                selectedRating = starValue;
                ratingInput.value = selectedRating;
                updateStars(selectedRating);
                document.getElementById("rating-form").submit();
            });
        });

        // On page load, update based on current value
        updateStars(selectedRating);
    });
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.star').forEach(function(star) {
            star.addEventListener('click', function() {
                console.log("test"); // Pour debug
                const rating = this.getAttribute('data-value');
                document.getElementById('rating-input').value = rating;
                document.getElementById('rating-form').submit();
            });
        });
    });
</script>
