@extends('frontend.layouts.master')
@section('content')
    <main>
        <!--? slider Area Start -->
        <div class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                @if (count($banners) > 0)
                    @foreach ($banners as $banner)
                        <div class="single-slider slider-height d-flex align-items-center slide-bg">
                            <div class="container">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                        <div class="hero__caption">
                                            <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">
                                                {{ $banner->title }} </h1>
                                            <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">
                                                {{ $banner->description }} .</p>
                                            <!-- Hero-btn -->
                                            <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s"
                                                data-duration="2000ms">
                                                <a href="{{ $banner->slug }}" class="btn hero-btn">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
                                        <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                            <img src="{{ $banner->photo }}" alt="" class=" heartbeat">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif

            </div>
        </div>

        <!-- ? New Product Start -->
        <section class="new-product-area section-padding30">
            <div class="container">
                <!-- Section tittle -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-tittle mb-70">
                            <h2>Danh M???c</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-new-pro mb-30 text-center">
                                    <div class="product-img">
                                        <a href="{{ route('product.category', $category->slug) }}"> <img
                                                src="{{ $category->photo }}" alt=""> </a>
                                    </div>
                                    <div class="product-caption">
                                        <h3><a
                                                href="{{ route('product.category', $category->slug) }}">{{ $category->title }}</a>
                                        </h3>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endif
                </div>
            </div>
        </section>



        <!--? Gallery Area Start -->
        <div class="container">
            <div class="col-xl-12">
                <div class="section-tittle mb-70">
                    <h2>New Arrivals</h2>
                </div>
            </div>
        </div>
        @php
            $newProducts = \App\Models\Product::where(['status' => 'active', 'conditions' => 'new'])
                ->orderBy('id', 'DESC')
                ->limit(3)
                ->get();
        @endphp
        <div class="container">
            <div class="row">
                @foreach ($newProducts as $product)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-new-pro mb-30 text-center">
                            <div class="product-img">
                                @php
                                    $photo = explode(',', $product->photo);
                                @endphp
                                <img src="{{ $photo[0] }}" alt="">
                            </div>
                            <div class="popular-caption">
                                <h3 class="text-danger">
                                    {{ \App\Models\Brand::where('id', $product->brand_id)->value('title') }}
                                </h3>
                                <h3><a class="text-danger" href="{{ route('product.detail',$product->slug) }}">{{ $product->title }}</a>
                                </h3>
                                @if ($product->offer_price)
                                    <span> {{ number_format($product->offer_price, 2) }} VN??
                                        <small>
                                            <del class="text-danger">
                                                {{ number_format($product->price, 2) }} VN??
                                            </del>
                                        </small>
                                    </span>
                                @else
                                    <span> {{ number_format($product->price, 2) }} VN?? </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Gallery Area End -->
        <!--? Popular Items Start -->
        <div class="popular-items section-padding30">
            <div class="container">
                <!-- Section tittle -->
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="section-tittle mb-70 text-center">
                            <h2>Popular Items</h2>
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="/template/frontend/img/gallery/popular1.png" alt="">
                                <div class="img-cap">
                                    <span>Add to cart</span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                                <span>$ 45,743</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="/template/frontend/img/gallery/popular2.png" alt="">
                                <div class="img-cap">
                                    <span>Add to cart</span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                                <span>$ 45,743</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="/template/frontend/img/gallery/popular3.png" alt="">
                                <div class="img-cap">
                                    <span>Add to cart</span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                                <span>$ 45,743</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="/template/frontend/img/gallery/popular4.png" alt="">
                                <div class="img-cap">
                                    <span>Add to cart</span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                                <span>$ 45,743</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="/template/frontend/img/gallery/popular5.png" alt="">
                                <div class="img-cap">
                                    <span>Add to cart</span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                                <span>$ 45,743</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="/template/frontend/img/gallery/popular6.png" alt="">
                                <div class="img-cap">
                                    <span>Add to cart</span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                                <span>$ 45,743</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button -->
                <div class="row justify-content-center">
                    <div class="room-btn pt-70">
                        <a href="catagori.html" class="btn view-btn1">View More Products</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Items End -->
        <!--? Video Area Start -->
        <div class="video-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="video-wrap">
                            <div class="play-btn "><a class="popup-video"
                                    href="https://www.youtube.com/watch?v=KMc6DyEJp04"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Arrow -->
                <div class="thumb-content-box">
                    <div class="thumb-content">
                        <h3>Next Video</h3>
                        <a href="#"> <i class="flaticon-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Area End -->
        <!--? Watch Choice  Start-->
        <div class="watch-area section-padding30">
            <div class="container">
                <div class="row align-items-center justify-content-between padding-130">
                    <div class="col-lg-5 col-md-6">
                        <div class="watch-details mb-40">
                            <h2>Watch of Choice</h2>
                            <p>Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                            <a href="shop.html" class="btn">Show Watches</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="choice-watch-img mb-40">
                            <img src="/template/frontend/img/gallery/choce_watch1.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="choice-watch-img mb-40">
                            <img src="/template/frontend/img/gallery/choce_watch2.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="watch-details mb-40">
                            <h2>Watch of Choice</h2>
                            <p>Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                            <a href="shop.html" class="btn">Show Watches</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Watch Choice  End-->
        <!--? Shop Method Start-->
        <div class="shop-method-area">
            <div class="container">
                <div class="method-wrapper">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-package"></i>
                                <h6>Free Shipping Method</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-unlock"></i>
                                <h6>Secure Payment System</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-method mb-40">
                                <i class="ti-reload"></i>
                                <h6>Secure Payment System</h6>
                                <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Method End-->
    </main>
@endsection
