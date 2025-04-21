@props(["articleId"])

@auth
    @if(Auth::user()->starForArticle($articleId))
        <form id="rating-form" action="{{route("rating.update")}}" method="POST">
            @csrf
            @method("PUT")
            <input type="hidden" name="article_id" value="{{ $articleId }}">
            <input type="hidden" name="quantity" id="rating-input" value="{{ Auth::user()->starQuantityForArticle($articleId) }}">
            <div id="star-rating" style="cursor: pointer; font-size: 2rem; color: gold;">
                @for ($i = 1; $i <= 5; $i++)
                    @if($i <= Auth::user()->starQuantityForArticle($articleId))
                        <span class="star" data-value="{{ $i }}">
                                            {{ '★' }}
                        </span>
                    @else
                        <span class="star " data-value="{{ $i }}">
                                            {{ '☆' }}
                        </span>
                    @endif
                @endfor
            </div>
        </form>
    @else
        <form id="rating-form" action="{{route("rating.store")}}" method="POST">
            @csrf
            <input type="hidden" name="article_id" value="{{ $articleId }}">
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
                const rating = this.getAttribute('data-value');
                document.getElementById('rating-input').value = rating;
                document.getElementById('rating-form').submit();
            });
        });
    });
</script>
