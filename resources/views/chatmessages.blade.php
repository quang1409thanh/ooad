<div class="direct-chat-messages">
    @foreach($messages as $message)
        <div class="direct-chat-text">
            <span class="customer-name">{{$message->sender->customer_name}}</span> |
            <span
                class="message-datetime"> {{ date("d-M-Y h:i A", strtotime($message['message_date_time'])) }}</span><br>
            <span class="message-content">{{ $message['message'] }}</span>
        </div>
    @endforeach
</div>
