@extends('frontend.layouts.master')
@section('content')
    <main>

        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="product_img_slide owl-carousel">
                            @php
                                $photos = explode(',', $product->photo);
                                // dd($photos);
                            @endphp
                            @foreach ($photos as $key => $photo)
                                <div class="single_product_img">
                                    <img src="{{$photo}}"  alt=" #" class="img-fluid">
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="single_product_text text-center">
                            <h3>{{ $product->title }}</h3>
                            <p>
                                {{ $product->description }}
                            </p>
                            <div class="card_area">
                                <div class="product_count_area">
                                    <p>Quantity</p>
                                    <div class="product_count d-inline-block">
                                        <span class="product_count_item inumber-decrement"> <i
                                                class="ti-minus"></i></span>
                                        <input class="product_count_item input-number" type="text" value="1" min="0"
                                            max="10">
                                        <span class="product_count_item number-increment"> <i
                                                class="ti-plus"></i></span>
                                    </div>
                                </div>
                                <p>
                                    @if ($product->offer_price)
                                        <span> {{ number_format($product->offer_price, 2) }} VNĐ
                                            <small>
                                                <del class="text-danger">
                                                    {{ number_format($product->price, 2) }} VNĐ
                                                </del>
                                            </small>
                                        </span>
                                    @else
                                        <span> {{ number_format($product->price, 2) }} VNĐ </span>
                                    @endif
                                </p>
                                <div class="add_to_cart">
                                    <a href="#" class="btn_3">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->
        <!-- subscribe part here -->
        <section class="subscribe_part section_padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="subscribe_part_content">
                            <h2>Get promotions & updates!</h2>
                            <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic”
                                sources credibly innovate granular internal .</p>
                            <div class="subscribe_form">
                                <input type="email" placeholder="Enter your mail">
                                <a href="#" class="btn_1">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subscribe part end -->
    </main>
@endsection
