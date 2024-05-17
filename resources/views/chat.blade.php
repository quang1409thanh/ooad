<div class="container">
    <div class="row">
        <div class="round hollow">
            <a href="#" id=""><span class="glyphicon glyphicon-comment"></span> Chat with seller </a>
        </div>
    </div>
</div>

<div class="popup-box chat-popup" id="qnimate" style="display: none;">
    <div class="popup-head">
        <div class="popup-head-left pull-left">
            {{ $product->customer->customer_name }}
        </div>
        <div class="popup-head-right pull-right">
            <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i
                    class="glyphicon glyphicon-off"></i></button>
            <button data-widget="maximize" id="idmaximize" class="chat-header-button pull-right" type="button" style="display: none;">
                <i class="glyphicon glyphicon-plus"></i></button>
            <button data-widget="hide" id="idminimize" class="chat-header-button pull-right" type="button">
                <i class="glyphicon glyphicon-minus"></i></button>
        </div>
    </div>

    <div class="popup-messages" id="popup-messages">
        {{-- @include('chatmessages', ['messages' => $product->chatMessages]) --}}
    </div>

    <div class="popup-messages-footer" id="popup-messages-footer">
        <textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
    </div>
</div>
<style>
    .popup-box {
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 1px solid #ddd;
        background-color: #fff;
        width: 300px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        z-index: 9999; /* Ensure the chat box is above other content */
    }

    .popup-head {
        background-color: #f7f7f7;
        padding: 10px;
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .popup-messages {
        height: 200px;
        overflow-y: auto;
        padding: 10px;
    }

    .popup-messages-footer {
        padding: 10px;
        border-top: 1px solid #ddd;
    }

</style>

