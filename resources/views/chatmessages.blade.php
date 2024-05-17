@if(isset($messages) && !$messages->isEmpty())
    @foreach($messages as $message)
        <div class="message">
            <strong>{{ $message->sender->name }}:</strong> {{ $message->message }}
        </div>
    @endforeach
@else
    <div class="message">
        <em>No messages yet. Start the conversation!</em>
    </div>
@endif
