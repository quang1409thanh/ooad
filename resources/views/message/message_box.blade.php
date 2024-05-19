@include('header')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
    /* CSS for direct chat text container */
    .direct-chat-text {
        border: 1px solid #ddd;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    /* CSS for customer name */
    .direct-chat-text .customer-name {
        font-weight: bold;
        color: #007bff; /* Blue color for the username */
    }

    /* CSS for message datetime */
    .direct-chat-text .message-datetime {
        font-size: 0.85em;
        color: #555; /* Grey color for the datetime */
    }

    /* CSS for message content */
    .direct-chat-text .message-content {
        display: block;
        margin-top: 5px;
        font-size: 1em;
        color: #333; /* Default color for the message */
    }

    /* Example: changing the background color of message content */
    .direct-chat-text .message-content {
        background-color: #e9ecef;
        padding: 5px;
        border-radius: 3px;
    }

    /* CSS cho container của bảng điều khiển người dùng */
    .user-panel-container {
        padding-left: 5px;
        cursor: pointer;
        border-color: #afdfa0;
        box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);
    }

    /* CSS cho bảng điều khiển người dùng */
    .user-panel {
        border: 1px solid #afdfa0;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
        background-color: #f9f9f9;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    /* CSS khi người dùng di chuột vào bảng điều khiển */
    .user-panel:hover {
        background-color: #e6f7ff;
        box-shadow: 0 0 10px rgba(207, 220, 0, 0.6);
    }

    /* CSS cho bảng điều khiển được chọn */
    .user-panel.selected {
        background-color: #d9edf7;
        border-color: #31708f;
        box-shadow: 0 0 10px rgba(50, 150, 200, 0.6);
    }

    /* CSS cho tên khách hàng */
    .user-panel b {
        font-size: 1.2em;
        color: #007bff;
    }

    /* CSS cho biểu tượng và thời gian */
    .user-panel i {
        color: #555;
        margin-right: 5px;
    }

    /* CSS cho thời gian và tên sản phẩm */
    .user-panel .fa-calendar,
    .user-panel .fa-flickr {
        font-size: 0.9em;
        color: #888;
    }

    .user-panel .fa-calendar::before,
    .user-panel .fa-flickr::before {
        margin-right: 5px;
    }

    /* CSS cho khoảng cách giữa các thông tin */
    .user-panel br {
        margin-bottom: 5px;
    }

    /* CSS cho phần đầu của hộp thoại chat */
    .popup-head {
        background-color: #007bff; /* Màu nền của phần đầu */
        color: #fff; /* Màu chữ của phần đầu */
        padding: 25px; /* Khoảng cách nội dung với viền của phần đầu */
        margin-bottom: 10px;
        border-top-left-radius: 15px; /* Bo tròn góc trên bên trái của phần đầu */
        border-top-right-radius: 15px; /* Bo tròn góc trên bên phải của phần đầu */
    }

    /* CSS cho phần chứa tên người dùng */
    .popup-head-left {
        font-size: 1.2em; /* Kích thước chữ của tên người dùng */
        margin-bottom: 10px;
    }

    /* CSS cho textarea nhập tin nhắn */
    #status_message {
        width: calc(100% - 20px); /* Độ rộng của textarea (loại bỏ khoảng cách padding) */
        border: 1px solid #ddd; /* Viền của textarea */
        border-radius: 3px; /* Bo tròn góc của textarea */
        padding: 5px; /* Khoảng cách nội dung với viền của textarea */
        resize: none; /* Không cho phép resize kích thước của textarea */
    }

</style>

<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Message Box</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->


<!-- services -->
<div class="services" id="services">
    <div class="container">
        <div class="heading">
            <h3 data-aos="zoom-in">Message Box</h3>
        </div>
        <form method="post" action="" onsubmit="return validateform()" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3 user-panel-container">
                    @foreach($messageData as $userId => $userData)
                        <div class="panel panel-default user-panel" id="{{ $userId }}"
                             onclick="loadMessage('{{ $userId }}')">
                            <b>{{ $userData["customer"]->customer_name }}</b><br>
                            <i class="fa fa-calendar"></i>
                            {{ date("d-M-Y h:i A", strtotime(end($userData["messages"])->message_date_time)) }}<br>
                            <i class="fa fa fa-flickr"></i>
                            <a href="{{route('product.show', end($userData["messages"])->product->product_id) }}">{{ end($userData["messages"])->product->product_name }}</a>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-9"
                     style="padding-left:5px; cursor:pointer; border-color: #afdfa0; box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);">
                    <div class="popup-box chat-popup" id="qnimate">
                        <div class="popup-head">
                            <div class="popup-head-left pull-left" id="chat_name">
                            </div>
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
                <hr>
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

    var selectedUserId = null;

    function loadMessage(userId) {
        selectedUserId = userId;
        var userData = {!! json_encode($messageData) !!};
        var customer = userData[selectedUserId].customer;
        var messages = userData[selectedUserId].messages;
        var product_id = messages[0].product_id;

        $.ajax({
            url: '/loadmessages_box/' + userId + '/?product_id=' + product_id, // Địa chỉ URL để tải tin nhắn từ server
            type: 'GET',
            success: function (data) {
                // Cập nhật nội dung của popup-messages với tin nhắn mới
                $('#popup-messages').html(data);
                var customerName = customer.customer_name;
                var customerNameTag = $('<div style="padding-bottom: 15px; font-weight: bold">').text(customerName);
                $('#chat_name').html(customerNameTag);
                // Cuộn xuống cuối cùng của popup-messages để hiển thị tin nhắn mới nhất
                $('#popup-messages').scrollTop($('#popup-messages')[0].scrollHeight);
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error(xhr.responseText); // Log lỗi nếu có
            }
        });
    }

    $('#status_message').on('keyup', (e) => {
        if ($('#status_message').val() !== "") {
            if (e.key === "Enter") {
                var userData = {!! json_encode($messageData) !!};
                var customer = userData[selectedUserId].customer;
                var receiver_id = customer.customer_id;
                var sender_id = {{session('customer_id')}};
                var messages = userData[selectedUserId].messages;
                var product_id = messages[0].product_id;
                const csrfToken = '{{ csrf_token() }}'; // Lấy CSRF token từ blade template
                const message = $('#status_message').val();
                $.ajax({
                    url: '/chatmessage_box',
                    type: 'POST',
                    data: {
                        '_token': csrfToken, // Thêm CSRF token vào dữ liệu gửi đi
                        'message': message,
                        'productid': product_id,
                        'senderid': sender_id,
                        'receiverid': receiver_id,
                        'btnmessage': "Submit"
                    },
                    success: (data, status) => {
                        $('#status_message').val('');
                        $('#popup-messages').html(data);
                        $('#popup-messages').scrollTop($('#popup-messages')[0].scrollHeight);
                    },
                    error: (xhr, textStatus, errorThrown) => {
                        console.error(xhr.responseText); // Log lỗi nếu có
                    }
                });
            }
        }
    });


</script>

@include('footer')

