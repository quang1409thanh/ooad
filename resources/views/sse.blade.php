<!DOCTYPE html>
<html>
<head>
    <title>SSE Example</title>
</head>
<body>
<h1>Server-Sent Events Example</h1>
<div id="sse-data"></div>


</body>
<script>
    var eventSource = new EventSource('/sse');

    eventSource.onmessage = function (event) {
        console.log('Message received: ' + event.data);
    };
</script>

</html>
