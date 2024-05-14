<!DOCTYPE html>
<html>
<head>
    <title>Real-time Bid Update</title>
</head>
<body>
<h4>Current Bid Amount:<br>PKR<span id="currentBid">{{ $product->ending_bid }}</span></h4>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const productId = {{ $product->id }};
        const eventSource = new EventSource(`/sse?product_id=${productId}`);

        eventSource.onmessage = function(event) {
            const data = JSON.parse(event.data);
            document.getElementById('currentBid').innerText = data.ending_bid;
        };

        eventSource.onerror = function() {
            console.error('Error receiving SSE.');
            eventSource.close();
        };
    });
</script>
</body>
</html>
