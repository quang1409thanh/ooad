@include('header')
<style>
    .product-image {
        position: relative;
        overflow: hidden;
        border-radius: 8px; /* Optional, to match the img border-radius */
    }

    .product-image img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px; /* To match the container's border-radius */
    }

</style>
<script>function countdowntimer_latest(id, time) {
        // Kiểm tra xem phần tử có tồn tại trong DOM không
        var element = document.getElementById("countdowntime_latest" + id);
        if (element !== null) {
            // Set the date we're counting down to
            var countDownDate = new Date(time).getTime();

            // Update the count down every 1 second
            var x = setInterval(function () {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now an the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                element.innerHTML = "<b style='color: red;'>Time Remaining</b> <br><b>" + days + "Days " + hours + "hrs " + minutes + "min " + seconds + "sec</b>";


                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    element.innerHTML = "<center>" +
                        "<br>" +
                        "<b style='color: red;'>EXPIRED</b>" +
                        "</center>";
                }
            }, 1000);
        } else {
            console.error("Element with id 'countdowntime" + id + "' not found in the DOM.");
        }
    }
</script>
<script>function countdowntime_featured(id, time) {
        // Kiểm tra xem phần tử có tồn tại trong DOM không
        var element = document.getElementById("countdowntime_featured" + id);
        if (element !== null) {
            // Set the date we're counting down to
            var countDownDate = new Date(time).getTime();

            // Update the count down every 1 second
            var x = setInterval(function () {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now an the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                element.innerHTML = "<b style='color: red;'>Time Remaining</b> <br><b>" + days + "Days " + hours + "hrs " + minutes + "min " + seconds + "sec</b>";


                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    element.innerHTML = "<center>" +
                        "<br>" +
                        "<b style='color: red;'>EXPIRED</b>" +
                        "</center>";
                }
            }, 1000);
        } else {
            console.error("Element with id 'countdowntime" + id + "' not found in the DOM.");
        }
    }
</script>
<script>function countdowntimer_upcoming(id, time) {
        // Kiểm tra xem phần tử có tồn tại trong DOM không
        var element = document.getElementById("countdowntimer_upcoming" + id);
        if (element !== null) {
            // Set the date we're counting down to
            var countDownDate = new Date(time).getTime();

            // Update the count down every 1 second
            var x = setInterval(function () {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now an the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                element.innerHTML = "<b style='color: red;'>Time Remaining</b> <br><b>" + days + "Days " + hours + "hrs " + minutes + "min " + seconds + "sec</b>";


                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    element.innerHTML = "<center>" +
                        "<br>" +
                        "<b style='color: red;'>EXPIRED</b>" +
                        "</center>";
                }
            }, 1000);
        } else {
            console.error("Element with id 'countdowntime" + id + "' not found in the DOM.");
        }
    }
</script>

<script>function countdowntime_closing(id, time) {
        // Kiểm tra xem phần tử có tồn tại trong DOM không
        var element = document.getElementById("countdowntime_closing" + id);
        if (element !== null) {
            // Set the date we're counting down to
            var countDownDate = new Date(time).getTime();

            // Update the count down every 1 second
            var x = setInterval(function () {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now an the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                element.innerHTML = "<b style='color: red;'>Time Remaining</b> <br><b>" + days + "Days " + hours + "hrs " + minutes + "min " + seconds + "sec</b>";


                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    element.innerHTML = "<center>" +
                        "<br>" +
                        "<b style='color: red;'>EXPIRED</b>" +
                        "</center>";
                }
            }, 1000);
        } else {
            console.error("Element with id 'countdowntime" + id + "' not found in the DOM.");
        }
    }
</script>
<script>function countdowntime_closed(id, time) {
        // Kiểm tra xem phần tử có tồn tại trong DOM không
        var element = document.getElementById("countdowntime_closed" + id);
        if (element !== null) {
            // Set the date we're counting down to
            var countDownDate = new Date(time).getTime();

            // Update the count down every 1 second
            var x = setInterval(function () {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now an the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                element.innerHTML = "<b style='color: red;'>Time Remaining</b> <br><b>" + days + "Days " + hours + "hrs " + minutes + "min " + seconds + "sec</b>";


                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    element.innerHTML = "<center>" +
                        "<br>" +
                        "<b style='color: red;'>EXPIRED</b>" +
                        "</center>";
                }
            }, 1000);
        } else {
            console.error("Element with id 'countdowntime" + id + "' not found in the DOM.");
        }
    }
</script>

<hr>
<!-- Latest Auctions start -->
@include("home_view.latest_home");
<!-- Latest Auctions end -->
<hr>

<!-- Featured Auctions start -->
@include('home_view.featured_home');
<!-- Featured Auctions end -->
<hr>

<!-- Upcoming Auctions start -->
@include('home_view.upcoming_home');
<!-- Upcoming Auctions end -->
<hr>

<!-- Closing Auctions start -->
{{--@include('home_view.closing_home');--}}
<!-- Closing Auctions end -->
{{--<hr>--}}

<!-- Closed Auctions start -->
@include('home_view.closed_home');
<!-- Closed Auctions end -->

<hr>
@include('footer')
