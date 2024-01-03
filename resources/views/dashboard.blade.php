<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="facebook-domain-verification" content="mat5ybp55tf7qbx31hb214p7rcfn6a" />
    <script src="https://kit.fontawesome.com/391827d54c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('assest/style1.css') }}" />
    <title>Work On It - ChatBot</title>
</head>

<body>
    <div class="background-green"></div>


    <div class="main-container">
        <div class="left-container">

            <!--header -->
            <div class="header">
                <div class="user-img">


                    {{-- <img class="dp" src="https://www.codewithfaraz.com/InstaPic.png" alt=""> --}}


                </div>
                <div class="nav-icons">
                    {{-- <li><i class="fa-solid fa-users"></i></li>
                    <li><i class="fa-solid fa-message">
                    </i></li> --}}
                    <li><a href="{{ url('/logout') }}"
                            style="color: red;margin-top: -6px; text-decoration: none !important;
                        ">
                            <i class="fa fa-power-off" aria-hidden="true"> </i> Logout
                        </a> </li>

                </div>
            </div>


            <!--notification -->
            {{-- <div class="notif-box">
                <i class="fa-solid fa-bell-slash"></i>
                <div class="notif-text">
                    <p>Get Notified of New Messages</p>
                    <a href="#">Turn on Desktop Notifications ›</a>
                </div>
                <i class="fa-solid fa-xmark"></i>
            </div> --}}

            <!--search-container -->
            <div class="search-container">
                <div class="input">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="searchInput" placeholder="Search or start new chat   ">
                </div>
                <i class="fa-sharp fa-solid fa-bars-filter"></i>
            </div>


            <!--chats -->
            <div class="chat-list myDiv" id="myDiv">

                @foreach ($threads as $data)
                    <div class="chat-box" title="{{ $data->title }}">
                        <div class="img-box">
                            <img class="img-cover" src="{{ asset('storage/images/' . $data->image) }}"
                                title="{{ $data->image }}" alt="">
                        </div>
                        <div class="chat-details">
                            <img class="img-cover" src="{{ asset('storage/images/' . $data->image) }}"
                                title="{{ $data->image }}" alt="" style="display: none">
                            <div class="text-head">
                                <h4>{{ $data->name }}</h4>
                                {{-- <p class="time unread">11:49</p> --}}
                            </div>
                            <div class="text-message">
                                {{-- <p>“How are you?”</p> --}}
                                {{-- <b>1</b> --}}
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>
        <div class="right-container">
            <!--header -->
            <div class="header clear_content">
                <div class="img-text">
                    <div class="user-img user-pic" style="display: none">
                        <img class="dp dp-images"
                            src="https://images.pexels.com/photos/2474307/pexels-photo-2474307.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="">
                    </div>
                    <h4><span id="heading-text"></span><br><span></span></h4>
                </div>
                <button class="back_btn" style="display: none;"> <i class="fa fa-arrow-circle-left"
                        aria-hidden="true"></i> Go Back</button>
                {{-- <div class="nav-icons">
                    <li><i class="fa-solid fa-magnifying-glass"></i></li>
                    <li><i class="fa-solid fa-ellipsis-vertical"></i></li>
                </div> --}}
            </div>

            <!--chat-container -->
            <div class="chat-container">
                <div id="embed_chatbot_container_id"></div>

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
                    $(".clear_content").show();
                    var body = document.body;
                    var windowWidth = window.innerWidth;
                    if (windowWidth <= 768) {
                        $(".chat-list").hide();
                        $(".back_btn").show();
                        $(".right-container").css("position", "");
                        $("#embed_chatbot_container_id").css("height", "100%");;
                    } else {
                        $(".chat-list").show();
                        $("#back_btn").hide();
                        $(".right-container").css("position", "relative");;
                    }
                    $("#embed_chatbot_container_id").html('');
                    var txt = $(this).find('.chat-details').find(".text-head").find('h4').text()
                    var img = $(this).find('.chat-details').find(".img-cover").attr('src');
                    console.log(txt)
                    console.log(img)
                    $(".dp-images").attr('src', img)
                    $("#heading-text").html(txt)
                    $('.user-pic').show()
                    // $("#script_load").attr('src', 'chatbot.blade.php')
                    var scriptSrc = "{{ url('/chatbot') }}";
                    // Create an iframe element
                    var iframe = $("<iframe>")
                        .attr("src", scriptSrc)
                        .attr("width", "100%") // Set width as needed
                        .attr("height", "100%") // Set height as needed
                        .attr("frameborder", "0")
                        .attr("scrolling", "off");
                    // Append the iframe to a container in the HTML (e.g., a div with id "iframe-container")
                    $("#embed_chatbot_container_id").append(iframe);
                    //$(".chat-container").load($.getScript($(this).attr('title')))

                })
                $(document).on('click', '.back_btn', function() {
                    $(".chat-list").show();
                    $("#back_btn").hide();
                    $(".clear_content").hide();
                    $("#embed_chatbot_container_id").html('');
                })

            })
        </script>
        <script>
            const searchInput = document.getElementById('searchInput');
            // const searchButton = document.getElementById('searchButton');
            // const showAllButton = document.getElementById('showAllButton');
            const myDiv = document.getElementById('myDiv');
            let originalContent = myDiv.innerHTML; // Store original content of the div
            searchInput.addEventListener('input', function() {
                const searchText = searchInput.value; // Trim and convert to lowercase for case-insensitive search
                console.log(searchText)
                const divParagraphs = myDiv.getElementsByClassName('chat-box');
                let found = false;

                for (let i = 0; i < divParagraphs.length; i++) {
                    const paragraphText = divParagraphs[i].textContent.toLowerCase();
                    if (paragraphText.includes(searchText)) {
                        divParagraphs[i].style.display = 'flex';
                        found = true;
                    } else {
                        divParagraphs[i].style.display = 'none';
                    }
                }

                if (!found) {
                    console.log(searchText + "not found within the div");
                    // You can perform other actions here when text is not found
                }
            });

            // showAllButton.addEventListener('click', function() {
            //     searchInput.value = ''; // Clear the search input field
            //     myDiv.innerHTML = originalContent; // Restore original content of the div
            // });
        </script>
    </div>
    @include('sweetalert::alert')
</body>

</html>
