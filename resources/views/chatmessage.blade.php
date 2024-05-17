<div class="direct-chat-messages">
    @foreach($messages as $message)
        <div class="direct-chat-msg doted-border">
            <div class="direct-chat-text">
                <div class="direct-chat-text">
                    <b>Test</b> | {{ date("d-M-Y h:i A", strtotime($message['message_date_time'])) }}<br>
                    <b>{{ $message['message'] }}</b>
                </div>
            </div>
        </div>
    @endforeach
</div>

