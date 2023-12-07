<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/391827d54c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('assest/style1.css') }}" />
    <title>Whatsapp Clone</title>
</head>

<body>
    <div class="background-green"></div>


    <div class="main-container">
        <div class="left-container">

            <!--header -->
            <div class="header">
                <div class="user-img">
                    <img class="dp" src="https://www.codewithfaraz.com/InstaPic.png" alt="">
                </div>
                <div class="nav-icons">
                    <li><i class="fa-solid fa-users"></i></li>
                    <li><i class="fa-solid fa-message">
                        </i></li>
                    <li><i class="fa-solid fa-ellipsis-vertical"></i></li>
                </div>
            </div>


            <!--notification -->
            <div class="notif-box">
                <i class="fa-solid fa-bell-slash"></i>
                <div class="notif-text">
                    <p>Get Notified of New Messages</p>
                    <a href="#">Turn on Desktop Notifications ›</a>
                </div>
                <i class="fa-solid fa-xmark"></i>
            </div>

            <!--search-container -->
            <div class="search-container">
                <div class="input">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search or start new chat   ">
                </div>
                <i class="fa-sharp fa-solid fa-bars-filter"></i>
            </div>


            <!--chats -->
            <div class="chat-list">
                <div class="chat-box" title="https://www.uchat.com.au/js/widget/ve4cwaxxkhqj6ivg/embed.js?id=embed_chatbot_container_id">
                    <div class="img-box">
                        <img class="img-cover" src="https://lh5.googleusercontent.com/-7ssjf_mDE1Q/AAAAAAAAAAI/AAAAAAAAASo/tioYx2oklWEHoo5nAEyCT-KeLxYqE5PuQCLcDEAE/s100-c-k-no-mo/photo.jpg" alt="">
                    </div>
                    <div class="chat-details">
                        <div class="text-head">
                            <h4>CGit Support</h4>
                            <p class="time unread">11:49</p>
                        </div>
                        <div class="text-message">
                            <p>“How are you?”</p>
                            <b>1</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-container">
            <!--header -->
            <div class="header">
                <div class="img-text">
                    <div class="user-img user-pic" style="display: none">
                        <img class="dp" src="https://images.pexels.com/photos/2474307/pexels-photo-2474307.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                    </div>
                    <h4><span id="heading-text"></span><br><span></span></h4>
                </div>
                {{-- <div class="nav-icons">
                    <li><i class="fa-solid fa-magnifying-glass"></i></li>
                    <li><i class="fa-solid fa-ellipsis-vertical"></i></li>
                </div> --}}
            </div>

            <!--chat-container -->
            <div class="chat-container" style="padding: 0px !important;height: 462px">
                <div id="embed_chatbot_container_id" style="height: 462px"></div>

            </div>

            <!--input-bottom -->
            <!-- <div class="chatbox-input">
          <i class="fa-regular fa-face-grin"></i>
          <i class="fa-sharp fa-solid fa-paperclip"></i>
          <input type="text" placeholder="Type a message">
          <i class="fa-solid fa-microphone"></i>
        </div> -->
        </div>
        <script src="https://code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script>
            $(function() {
                $(document).on('click', '.chat-box', function() {
                    var txt = $(this).find('.chat-details').find(".text-head").find('h4').text()
                    console.log(txt)
                    $("#heading-text").html(txt)
                    $('.user-pic').show()
                    // $("#script_load").attr('src', 'chatbot.blade.php')
                    var scriptSrc = "{{ url('/chatbot') }}";
                    // Create an iframe element
                    var iframe = $("<iframe>")
                        .attr("src", scriptSrc)
                        .attr("width", "100%") // Set width as needed
                        .attr("height", "462px") // Set height as needed
                        .attr("frameborder", "0")
                        .attr("scrolling", "off");
                    // Append the iframe to a container in the HTML (e.g., a div with id "iframe-container")
                    $("#embed_chatbot_container_id").append(iframe);
                    //$(".chat-container").load($.getScript($(this).attr('title')))
                })
            })
        </script>
    </div>
    @include('sweetalert::alert')
</body>

</html>