<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/manageChatbot') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/manageChatbot') }}">
                    <span data-feather="file"></span>
                    Chatbots
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/addChatbot') }}">
                    <span data-feather="shopping-cart"></span>
                    Add Chatbot
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Admins
                </a>
            </li>
        </ul>



    </div>
</nav>
