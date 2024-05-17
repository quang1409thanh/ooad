@include('header')

<!-- services -->
<div class="services" id="services">
    <div class="container">
        <div class="heading">
            <h3 data-aos="zoom-in">Message Box</h3>
        </div>


        <form method="post" action="" onsubmit="return validateform()" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3"
                     style="padding-left:5px; cursor:pointer; border-color: #afdfa0; box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);">
                    @foreach($messageData as $userId => $userData)
                        <div class="panel panel-default" id="{{ $userId }}" onclick="loadMessage('{{ $userId }}')">
                            <b>{{ $userData["customer"]->customer_name }}</b><br>
                            <i class="fa fa-calendar"></i> {{ date("d-M-Y h:i A", strtotime($userData["messages"][0]->message_date_time)) }}
                            <br>
                            <i class="fa fa fa-flickr"></i> {{ $userData["messages"][0]->product->product_name }}
                        </div>
                    @endforeach
                </div>

                <div class="col-md-9"
                     style="padding-left:5px; cursor:pointer; border-color: #afdfa0; box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);">
                    <div class="popup-box chat-popup" id="qnimate">
                        <div class="popup-head">
                            <div class="popup-head-left pull-left">{{ $rsproduct->hall_name }}</div>
                        </div>

                        <div class="popup-messages" id="popup-messages" style="overflow:auto; height:400px;">
                            <!-- Nội dung tin nhắn sẽ được thay đổi bằng JavaScript -->
                        </div>

                        <div class="popup-messages-footer" id="popup-messages-footer">
                            <textarea id="status_message" placeholder="Type a message..." style="width:100%;"
                                      name="message"></textarea>
                        </div>
                    </div>
                </div>

                <script>
                    function loadMessage(userId) {
                        var popupMessages = document.getElementById('popup-messages');
                        var userData = {!! json_encode($messageData) !!};
                        var messages = userData[userId].messages;
                        var messageHTML = '';

                        messages.forEach(function(message) {
                            messageHTML += '<div class="direct-chat-text">';
                            messageHTML += '<b>HEY</b> | ' + message.message_date_time + '<br>';
                            messageHTML += '<b>' + message.message + '</b>';
                            messageHTML += '</div>';
                        });

                        popupMessages.innerHTML = messageHTML;
                    }
                </script>

                <div class="col-md-12">
                    <hr>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- //services -->
<script>
    // Thêm một sự kiện click cho các panel chứa thông tin của mỗi người gửi
    $('.panel.panel-default').click(function () {
        // Lấy sender_id của người gửi từ thuộc tính data-senderid
        var senderId = $(this).data('senderid');
        // Gọi hàm loadmessage để tải tin nhắn từ người gửi có senderId
        loadmessage(senderId);
        // Hiển thị hộp thoại chat
        $('#qnimate').addClass('popup-box-on');
    });

    // Hàm loadmessage để tải tin nhắn từ người gửi có senderId
    function loadmessage(senderId) {
        // Gửi yêu cầu Ajax để lấy tin nhắn từ người gửi có senderId
        $.ajax({
            url: '/loadmessages/' + senderId, // Địa chỉ URL để tải tin nhắn từ server
            type: 'GET',
            success: function (data) {
                // Cập nhật nội dung của popup-messages với tin nhắn mới
                $('#popup-messages').html(data);
                // Cuộn xuống cuối cùng của popup-messages để hiển thị tin nhắn mới nhất
                $('#popup-messages').scrollTop($('#popup-messages')[0].scrollHeight);
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error(xhr.responseText); // Log lỗi nếu có
            }
        });
    }

</script>
@include('footer')

