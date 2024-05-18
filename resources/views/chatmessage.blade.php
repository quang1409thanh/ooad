<div class="direct-chat-messages">
    @foreach($messages  as $message)
        <div class="direct-chat-msg">
            <div class="direct-chat-text">
                <b>{{$message->sender->customer_name}}</b>
                | {{ date("d-M-Y h:i A", strtotime($message['message_date_time'])) }}<br>
                <b>{{ $message['message'] }}</b>
            </div>
        </div>
    @endforeach
</div>

