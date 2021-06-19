<header class="header">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header_content d-flex flex-row align-items-center justify-content-start">
                    <div class="logo"><a href="#"><img src="{{asset("images/logo.svg")}}" height="30" width="30" alt=""> AniBlog</a></div>
                    <nav class="main_nav">
                        <ul>
                            <li class="active"><a href="index.html">Home</a></li>
                            <li><a href="#">Anime</a></li>
                            <li><a href="#">Manga</a></li>
                            <li><a href="#">Games</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="search_container ml-auto">
                        <form action="#">
                            <input type="search" class="header_search_input" required="required" placeholder="Type to Search...">
                            <img class="header_search_icon" src="{{asset("front/images/search.png")}}" alt="">
                        </form>

                    </div>
                    <div class="hamburger ml-auto menu_mm">
                        <i class="fa fa-bars trans_200 menu_mm" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Menu -->

<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
    <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
    <div class="logo menu_mm"><a href="#">AniBlog</a></div>
    <div class="search">
        <form action="#">
            <input type="search" class="header_search_input menu_mm" required="required" placeholder="Type to Search...">
            <img class="header_search_icon menu_mm" src="{{ asset("front/images/search_2.png") }}" alt="">
        </form>
    </div>
    <nav class="menu_nav">
        <ul class="menu_mm">
            <li class="menu_mm"><a href="index.html">Home</a></li>
            <li class="menu_mm"><a href="#">Anime</a></li>
            <li class="menu_mm"><a href="#">Manga</a></li>
            <li class="menu_mm"><a href="#">Games</a></li>
            <li class="menu_mm"><a href="#">About Us</a></li>
            <li class="menu_mm"><a href="contact.html">Contact</a></li>
        </ul>
    </nav>
</div>
