<footer class="footer">
    <div class="container">
        <div class="row row-lg-eq-height">
            <div class="col-lg-9 order-lg-1 order-2">
                <div class="footer_content">
                    <div class="footer_logo"><a href="#"><img src="{{$footer[0]->image}}" height="22.4" width="22.4" alt="">{{$footer[0]->title}}</a></div>
                    <div class="footer_social">
                        <ul>
                            @foreach ($footer[0]->footericons as $item)
                            <li class="footer_social_facebook"><a href="{{$item->link}}"><i class="{{$item->icon}}" aria-hidden="true"></i></a></li>

                            @endforeach
                        </ul>
                    </div>
                    <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
{{$footer[0]->copyright}}</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-2 order-1">
                <div class="subscribe">
                    <div class="subscribe_background"></div>
                    <div class="subscribe_content">
                        <div class="subscribe_title">Subscribe</div>
                        <form action="#">
                            <input type="email" class="sub_input" placeholder="Your Email" required="required">
                            <button class="sub_button">
                                <svg version="1.1" id="link_arrow_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     width="19px" height="13px" viewBox="0 0 19 13" enable-background="new 0 0 19 13" xml:space="preserve">
                                    <polygon fill="#FFFFFF" points="12.475,0 11.061,0 17.081,6.021 0,6.021 0,7.021 17.038,7.021 11.06,13 12.474,13 18.974,6.5 "/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
