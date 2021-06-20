@extends('layouts.main.index')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/post.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/post_responsive.css') }}">
@endsection
@section('content')

    <div class="home">
        <div class="home_background parallax-window" style="background: rgba(0,0,0,0.4);" data-parallax="scroll" data-image-src="{{ $post->post_image }}"
            data-speed="0.8"></div>
        <div class="home_content">
            @foreach ($post->categories as $item)

                <div class="post_category trans_200 d-inline-block"><a href="category.html"
                        class="trans_200">{{ $item->category->name }}</a></div>
            @endforeach
            <div class="post_title">{{ $post->title }}</div>
        </div>
    </div>
    <div class="page_content mb-5">
        <div class="container">
            <div class="row row-lg-eq-height">
                <div class="col-lg-9">
                    <div class="post_content">

                        <!-- Top Panel -->
                        <div class="post_panel post_panel_top d-flex flex-row align-items-center justify-content-start">
                            <div class="author_image">
                                <div><img src="{{ $post->user->image_path }}" alt=""></div>
                            </div>
                            <div class="post_meta"><a
                                    href="#">{{ $post->user->name }}</a><span>{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y h:m A') }}</span>
                            </div>
                            <div class="post_share ml-sm-auto">
                                <span>share</span>
                                <ul class="post_share_list">
                                    <li class="post_share_item"><a href="#"><i class="fab fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li class="post_share_item"><a href="#"><i class="fab fa-twitter"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Post Body -->

                        <div class="post_body">
                            <p class="post_p text-center">{{ $post->title }}</p>
                            <figure class="text-center">
                                <img src="{{ $post->post_image }}" alt="">
                                <figcaption>{{ $post->title }}</figcaption>
                            </figure>
                            <p class="post_p">{!! $post->content !!}</p>


                            <!-- Post Tags -->
                            <div class="post_tags">
                                <ul>
                                    @foreach ($post->categories as $item)
                                        <li class="post_tag" style="background: {{ $item->category->color }};"><a
                                                href="#">{{ $item->category->name }}</a></li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Bottom Panel -->
                        <div class="post_panel bottom_panel d-flex flex-row align-items-center justify-content-start">
                            <div class="author_image">
                                <div><img src="{{ $post->user->image_path }}" alt=""></div>
                            </div>
                            <div class="post_meta"><a
                                    href="#">{{ $post->user->name }}</a><span>{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y h:m A') }}</span>
                            </div>
                            <div class="post_share ml-sm-auto">
                                <span>share</span>
                                <ul class="post_share_list">
                                    <li class="post_share_item"><a href="#"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li class="post_share_item"><a href="#"><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li class="post_share_item"><a href="#"><i class="fa fa-google"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>


                    </div>
                    {{-- <div class="load_more">
                        <div id="load_more" class="load_more_button text-center trans_200">Load More</div>
                    </div> --}}
                </div>

                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="sidebar_background"></div>

                        <!-- Top Stories -->

                        <div class="sidebar_section">
                            <div class="sidebar_title_container">
                                <div class="sidebar_title">You might like</div>

                            </div>
                            @foreach ($random as $random_post)
                            <div class="row mt-4">
                                <div class="col">
                                    <div class="side_post">
                                        <a href="post.html">
                                            <div
                                                class="d-flex flex-row align-items-xl-center align-items-start justify-content-start">
                                                <div class="side_post_image">
                                                    <div class="overflow-hidden" style="background-image: url('{{$random_post->post_image}}'); background-size:cover;"></div>
                                                </div>
                                                <div class="side_post_content">
                                                    <div class="side_post_title">{{$random_post->title}}
                                                    </div>
                                                    <small class="post_meta">{{$random_post->user->name}}<span>{{ \Carbon\Carbon::parse($random_post->created_at)->format('M d') }}</span></small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>







                        <!-- Future Events -->



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('front/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('front/js/post.js') }}"></script>
@endsection
