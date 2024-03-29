<!doctype html>
<html lang="en">

<head>
    @include('home.css')

    <!--

Tooplate 2137 Barista Cafe

https://www.tooplate.com/view/2137-barista-cafe

Bootstrap 5 HTML CSS Template

-->
</head>

<body>

    <main>

        @include('home.header')

        @include('sweetalert::alert')

        @include('home.welcome')

        @include('home.about')

        @include('home.meetpeople')

        @include('home.menu')

        @include('home.review')

        @include('home.contact')

        @include('home.footer')
    </main>

    <!-- JAVASCRIPT FILES -->

    @include('home.script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ratingRange = document.getElementById("rating");
            var currentRating = document.getElementById("currentRating");

            // Update the displayed rating when the range input changes
            ratingRange.addEventListener("input", function () {
                var rating = parseFloat(ratingRange.value);
                currentRating.textContent = rating;
            });
        });

        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
</body>

</html>
