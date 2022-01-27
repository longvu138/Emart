@extends('frontend.layouts.master')
@section('content')
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Watch Shop</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="popular-items latest-padding">
            <div class="container">
                <div class="row product-btn justify-content-between mb-40">
                    <div class="properties__button">
                        <!--Nav Button  -->
                        <!--End Nav Button  -->
                    </div>
                    <!-- Grid and List view -->
                    <div class="grid-list-view">
                    </div>
                    <!-- Select items -->
                    <div class="select-this">
                        <form action="#">
                            <div class="select-itms">
                                <select name="select" id="sortBy">
                                    <option selected> Mặc Định </option>
                                    <option value="priceDesc">Giá Từ Cao - Thấp</option>
                                    <option value="priceAsc">Giá Từ Thấp - Cao</option>
                                    <option value="titleAsc">Tên Theo thứ tự tăng dần</option>
                                    <option value="titleDesc">Tên Theo thứ tự giảm dần</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row" id="product-data">
                            @include('frontend.layouts._single-product')
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="ajax-load text-center" style="display: none">
            <img style="width: 6%;" src="https://upload.wikimedia.org/wikipedia/commons/5/54/Ajux_loader.gif" alt="load">
        </div>

    </main>
@endsection

@section('script')
    <script>
        $('#sortBy').change(function() {
            let sort = $('#sortBy').val();
            window.location = "{{ url('' . $route . '') }}/{{ $categories->slug }}?sort=" + sort;
        })
    </script>

    <script>
        function loadmoreData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: 'get',
                    beforeSend: function() {
                        $('.ajax-load').show();
                    },
                })
                .done(function(data) {
                    if (data.html == '') {
                        $('.ajax-load').html('hết');
                        return;
                    }
                    $('.ajax-load').hide();
                    $('#product-data').append(data.html);

                })
                .fail(function() {
                    alert('err')
                })
        }

        let page = 1;
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() + 120 >= $(document).height()) {
                page++;
                loadmoreData(page);
            }
        })
    </script>
@endsection
