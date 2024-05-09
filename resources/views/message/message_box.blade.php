@include('header')

<!-- services -->
<div class="services" id="services">
    <div class="container">
        <div class="heading">
            <h3 data-aos="zoom-in">Message Box</h3>
        </div>

        <form method="post" action="" onsubmit="return validateform()" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3" style='padding-left:5px;cursor:pointer; border-color: #afdfa0;  box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);'>
                    @foreach($messages as $message)
                        <div class='panel panel-default' style='padding-left:5px;cursor:pointer; border-color: #cfdc00;  box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);' onclick='loadmessage({{ $message->sender_id }}, {{ $message->receiver_id }}, {{ $message->product_id }})'>
                            <b>{{ $message->sender->customer_name }}</b><br>
                            <i class='fa fa-calendar'></i> {{ date("d-M-Y h:i A", strtotime($message->message_date_time)) }}<br>
                            <i class='fa fa fa-flickr'></i> {{ $message->product->product_name }}
                        </div>
                    @endforeach
                </div>
                <div class="col-md-9" style='padding-left:5px;cursor:pointer; border-color: #afdfa0;  box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);'>
                    <div class="popup-box chat-popup" id="qnimate">
                        <div class="popup-head">
                            <div class="popup-head-left pull-left">{{ $rsproduct->hall_name }}</div>
                        </div>

                        <div class="popup-messages" id="popup-messages" style='overflow:auto; height:400px;'>
                            <!-- Include chat messenger content here -->
                        </div>

                        <div class="popup-messages-footer" id="popup-messages-footer">
                            <textarea id="status_message" placeholder="Type a message..." style="width:100%;" name="message"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <hr>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
</div>
</div>
</div>
<!-- //services -->

@include('footer')

<script>
    $('#status_message').bind('keyup', function(e) {
        var message = $('#status_message').val();
        if (message != "") {
            if (e.keyCode === 13) { // 13 is enter key
                $.post("chatmessenger.php", {
                        'message': message,
                        'productid': 0,
                        'senderid': 0,
                        'receiverid': 0,
                        'status': 'Hall',
                        'btnmessage': 'btnmessage'
                    },
                    function(data, status) {
                        $('#status_message').val('');
                        $('#popup-messages').html(data);
                        $('#popup-messages').scrollTop($('#popup-messages')[0].scrollHeight);
                    });
            }
        }
    });

    function loadmessage(senderid, receiverid, productid) {
        var message = "";
        $.post("chatmessenger.php", {
                'message': message,
                'productid': productid,
                'senderid': senderid,
                'receiverid': receiverid,
                'status': 'Seller',
                'btnmessage': 'btnmessage'
            },
            function(data, status) {
                $('#popup-messages').html(data);
                $('#popup-messages').scrollTop($('#popup-messages')[0].scrollHeight);
            });
    }

    setInterval(function() {
        loadmessage(0, 0); // this will run after every 5 seconds
    }, 5000);
</script>
