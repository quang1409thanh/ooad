<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">
    <div class="row">
        <div class="round hollow">
            <a href="#" id="addClass"><span class="glyphicon glyphicon-comment"></span> Chat with seller </a>
        </div>
    </div>
</div>

<div class="popup-box chat-popup" id="qnimate">
    <div class="popup-head">
        <div class="popup-head-left pull-left">
            <img src="{{asset('img/favicon.ico')}}" alt="iamgurdeeposahan">
            {{$product->customer->customer_name}}
        </div>
        <div class="popup-head-right pull-right">
            <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button">
                <img src="{{url('img/x-button.png')}}" alt="Turn Off">

            </button>
            <button data-widget="maximize" id="idmaximize" class="chat-header-button pull-right" type="button">
                <img src="{{url('img/plus.png')}}" alt="Turn Off">
            </button>
            <button data-widget="hide" id="idminimize" class="chat-header-button pull-right" type="button">
                <img src="{{url('img/minus.png')}}" alt="minus">
            </button>
        </div>
    </div>

    <div class="popup-messages" id="popup-messages">
        @include('chatmessage')
    </div>

    <div class="popup-messages-footer" id="popup-messages-footer">
        <textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
    </div>
</div>

<script>
    $(document).ready(() => {
        $("#addClass").on("click", () => {
            $("#idmaximize").hide();
            $('#qnimate').addClass('popup-box-on');
        });

        $("#removeClass").on("click", () => {
            $('#qnimate').removeClass('popup-box-on');
        });

        $('#status_message').on('keyup', (e) => {
            if ($('#status_message').val() !== "") {
                if (e.key === "Enter") {
                    const message = $('#status_message').val();
                    const productid = '{{ $product->product_id }}';
                    const senderid = '{{ session('customer_id') }}';
                    const receiverid = '{{ $product->customer->customer_id }}';
                    const csrfToken = '{{ csrf_token() }}'; // Lấy CSRF token từ blade template

                    $.ajax({
                        url: '/chatmessage',
                        type: 'POST',
                        data: {
                            '_token': csrfToken, // Thêm CSRF token vào dữ liệu gửi đi
                            'message': message,
                            'productid': productid,
                            'senderid': senderid,
                            'receiverid': receiverid,
                            'btnmessage': "Submit"
                        },
                        success: (data, status) => {
                            console.log(data);
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


        $("#idminimize").on("click", () => {
            $("#popup-messages").hide();
            $("#popup-messages-footer").hide();
            $("#idminimize").hide();
            $("#idmaximize").show();
        });

        $("#idmaximize").on("click", () => {
            $("#popup-messages").show();
            $("#popup-messages-footer").show();
            $("#idminimize").show();
            $("#idmaximize").hide();
        });

        function loadmessage(productid, senderid, receiverid) {
            $.ajax({
                url: "/load-messages/" + productid,
                type: "GET",
                data: {
                    'productid': productid,
                    'senderid': senderid,
                    'receiverid': receiverid,
                    'status': 'Seller',
                    'btnmessage': 'btnmessage'
                },
                success: function (data, status) {
                    $('#popup-messages').html(data);
                    $('#popup-messages').scrollTop($('#popup-messages')[0].scrollHeight);
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error(xhr.responseText); // Log lỗi nếu có
                }
            });
        }

        $(document).ready(function () {
            $("#addClass").on("click", function () {
                $("#idmaximize").hide();
                $('#qnimate').addClass('popup-box-on');
                loadmessage('{{ $product->product_id }}', '{{ session('customer_id') }}', '{{ $product->customer->customer_id }}');
            });

            // Load messages initially when the document is ready
            loadmessage('{{ $product->product_id }}', '{{ session('customer_id') }}', '{{ $product->customer->customer_id }}');

            // Update messages every 5 seconds
            setInterval(function () {
                loadmessage('{{ $product->product_id }}', '{{ session('customer_id') }}', '{{ $product->customer->customer_id }}');
            }, 5000);
        });
    });

</script>
{{--@endsection--}}
<style>


</style>
<style>

    @import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    .popup-box {
        border: 2px solid #4306ed;
        border-radius: 12px;
        bottom: 0;
        display: none;
        /*height: 415px;*/
        position: fixed;
        right: 0px;
        width: 300px;
        font-family: 'Open Sans', sans-serif;
        z-index: 99999999;
    }

    .round.hollow {
        margin: 0px 0 20px;
    }

    .round.hollow a {
        border: 2px solid #ff6701;
        border-radius: 35px;
        color: red;
        color: #ff6701;
        font-size: 23px;
        padding: 10px 21px;
        text-decoration: none;
        font-family: 'Open Sans', sans-serif;
    }

    .round.hollow a:hover {
        border: 2px solid #000;
        border-radius: 35px;
        color: red;
        color: #000;
        font-size: 23px;
        padding: 10px 21px;
        text-decoration: none;
    }

    .popup-box-on {
        display: block !important;
    }

    .popup-box .popup-head {
        border-radius: 8px;
        border: 2px solid #4306ed;
        background-color: white;
        clear: both;
        color: #7b7b7b;
        display: inline-table;
        font-size: 21px;
        padding: 0px 10px;
        width: 100%;
        font-family: Oswald;
    }

    .popup-box .popup-head .popup-head-right {
        margin: 11px 7px 0;
    }

    .popup-head-right .btn-group {
        display: inline-flex;
        margin: 0 8px 0 0;
        vertical-align: top !important;
    }

    .popup-head-right .btn-group .dropdown-menu {
        border: medium none;
        min-width: 122px;
        padding: 0;
    }

    .popup-head-right .btn-group .dropdown-menu li a {
        font-size: 12px;
        padding: 3px 10px;
        color: #303030;
    }

    .popup-box .popup-messages {
    }

    .popup-head-left img {
        border: 1px solid #7b7b7b;
        border-radius: 50%;
        width: 44px;
    }

    .popup-messages-footer > textarea {
        border: none;
        border-radius: 25px;
        background-color: #f3f3f3;
        height: 40px;
        margin: 7px;
        padding: 10px;
        width: calc(100% - 20px);
        resize: none;
        font-size: 14px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .popup-messages-footer {
        background: #fff none repeat scroll 0 0;
        bottom: 0;
        position: absolute;
        width: 100%;
    }

    .popup-messages-footer .btn-footer {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .popup-messages-footer .btn-footer:hover {
        background-color: #0056b3;
    }

    .simple_round {
        background: #d1d1d1 none repeat scroll 0 0;
        border-radius: 50%;
        color: #4b4b4b !important;
        height: 21px;
        padding: 0 0 0 1px;
        width: 21px;
    }

    .popup-box .popup-messages {
        background: linear-gradient(135deg, #667eea, #764ba2, #6B8E23, #FFA07A, #40E0D0);
        /*none repeat scroll 0 0;*/
        height: 375px;
        overflow: auto;
        padding-bottom: 60px;
    }

    .direct-chat-messages {
        overflow: auto;
        padding: 10px;
        transform: translate(0px, 0px);
    }

    .popup-messages .chat-box-single-line {
        border-bottom: 1px solid #a4c6b5;
        height: 12px;
        margin: 7px 0 20px;
        position: relative;
        text-align: center;
    }

    .popup-messages abbr.timestamp {
        background: #3f9684 none repeat scroll 0 0;
        color: #fff;
        padding: 0 11px;
    }


    .chat-header-button {
        background: transparent none repeat scroll 0 0;
        border: 1px solid #636364;
        border-radius: 50%;
        font-size: 14px;
        height: 30px;
        width: 30px;
    }


    .popup-messages abbr.timestamp {
        background: #3f9684 none repeat scroll 0 0;
        color: #fff;
        padding: 0 11px;
    }

    .popup-messages .chat-box-single-line {
        border-bottom: 1px solid #a4c6b5;
        height: 12px;
        margin: 7px 0 20px;
        position: relative;
        text-align: center;
    }

    .popup-messages .direct-chat-messages {
        height: auto;
    }

    .popup-messages .direct-chat-text {
        background: none repeat scroll 0 0;
        border: 1px solid #dfece7;
        border-radius: 2px;
        color: #1f2121;
    }

    .popup-messages .direct-chat-timestamp {
        color: #fff;
        opacity: 0.6;
    }

    .popup-messages .direct-chat-name {
        font-size: 15px;
        font-weight: 600;
        margin: 0 0 0 49px !important;
        color: #fff;
        opacity: 0.9;
    }

    .popup-messages .direct-chat-info {
        display: block;
        font-size: 12px;
        margin-bottom: 0;
    }

    .popup-messages .big-round {
        margin: -9px 0 0 !important;
    }

    .popup-messages .direct-chat-img {
        border: 1px solid #fff;
        background: #3f9684 none repeat scroll 0 0;
        border-radius: 50%;
        float: left;
        height: 40px;
        margin: -21px 0 0;
        width: 40px;
    }

    .direct-chat-reply-name {
        color: #fff;
        font-size: 15px;
        margin: 0 0 0 10px;
        opacity: 0.9;
    }

    .direct-chat-img-reply-small {
        border: 1px solid #fff;
        border-radius: 50%;
        float: left;
        height: 20px;
        margin: 0 8px;
        width: 20px;
        background: #3f9684;
    }

    .popup-messages .direct-chat-msg {
        margin-bottom: 10px;
        position: relative;
    }

    .popup-messages .doted-border::after {
        background-color: red;
        /*background: transparent none repeat scroll 0 0 !important;*/
        border-right: 2px dotted #fff !important;
        bottom: 0;
        content: "";
        left: 17px;
        margin: 0;
        position: absolute;
        top: 0;
        width: 2px;
        display: inline;
        z-index: -2;
    }

    .popup-messages .direct-chat-msg::after {
        /*background: #fff none repeat scroll 0 0;*/
        border-right: medium none;
        bottom: 0;
        content: "";
        left: 17px;
        margin: 0;
        position: absolute;
        top: 0;
        width: 2px;
        display: inline;
        z-index: -2;
    }

    .direct-chat-text::after, .direct-chat-text::before {

        border-color: transparent #dfece7 transparent transparent;

    }

    .direct-chat-text::after, .direct-chat-text::before {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        border-color: transparent #d2d6de transparent transparent;
        border-image: none;
        border-style: solid;
        border-width: medium;
        content: " ";
        height: 0;
        pointer-events: none;
        position: absolute;
        right: 100%;
        top: 15px;
        width: 0;
    }

    .direct-chat-text::after {
        border-width: 5px;
        margin-top: -5px;
    }

    .popup-messages .direct-chat-text {
        background: #dfece7 none repeat scroll 0 0;
        border: 1px solid #dfece7;
        border-radius: 2px;
        color: #1f2121;
    }



</style>
