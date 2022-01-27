
            @if (count($products) > 0)
                @foreach ($products as $product)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img src="{{ $product->photo }}" alt="">
                                <div class="img-cap">
                                    <span><a href="#">Add To Cart</a></span>
                                </div>
                                <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div>
                            </div>
                            <div class="popular-caption">
                                <h3><a
                                        href="">{{ \App\Models\Brand::where('id', $product->brand_id)->value('title') }}</a>
                                </h3>
                                <h3><a href="">{{ ucfirst($product->title) }}</a></h3>
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



                            </div>
                        </div>
                    </div>
                @endforeach

            @else
                    <div class="text-center">
                        
                    </div>
            @endif

