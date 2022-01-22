@extends('backend.layouts.master')

@section('content')

    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    @include('backend.layouts.notification')
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">{{ $title }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.update', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT')  
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên Sản Phẩm *</label>
                                            <input type="text" class="form-control" required name="title"
                                                value="{{ $product->title }}">
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Summary *</label>
                                            <textarea class="form-control" id='summary'
                                                name="summary"> {{ $product->summary }}  </textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>description *</label>
                                            <textarea class="form-control" id='description' name="description">
                                                {{ $product->description }} </textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Stock</label>
                                            <input type="number" class="form-control" required name="stock" step="any"
                                                value="{{ $product->stock }}">
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Giá tiền</label>
                                            <input type="number" class="form-control" required name="price" step="any"
                                                value="{{ $product->price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> discount</label>
                                            <input type="number" class="form-control" required name="discount" step="any"
                                                min="0" max="99" value="{{ $product->discount }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Brand *</label>
                                            <div class="dropdown bootstrap-select form-control">
                                                <select name="brand_id" class="selectpicker form-control" data-style="py-0">
                                                    <option value="">--Brand --</option>
                                                    @foreach (\App\Models\Brand::get() as $brand)
                                                        <option value="{{ $brand->id }}" {{$brand->id == $product->brand_id?  'selected' : ''}} > {{ $brand->title }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="">
                                            <label>Category *</label>
                                            <div class="dropdown bootstrap-select form-control">
                                                <select id="cat_id" name="cat_id" class="selectpicker form-control"
                                                    data-style="py-0">
                                                    <option value="">--Category --</option>
                                                    @foreach (\App\Models\Category::where('is_parent', 1)->get() as $category)
                                                        <option value="{{ $category->id }}" {{$category->id == $product->cat_id?  'selected' : ''}}  > {{ $category->title }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class=" form-group d-none form-group" id="child_cat_div">
                                            <label>Child Category *</label>
                                            <select id="child_cat_id" name="child_cat_id" class="form-control">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Size *</label>
                                            <div class="dropdown bootstrap-select form-control">
                                                <select name="size" class="selectpicker form-control" data-style="py-0">
                                                    <option value="">-- Size --</option>
                                                    <option value="S" {{ $product->size  == 'S' ? 'selected' : '' }}>
                                                        Small </option>
                                                    <option value="M" {{ $product->size  == 'M' ? 'selected' : '' }}>
                                                        Medium </option>
                                                    <option value="L" {{ $product->size  == 'L' ? 'selected' : '' }}>
                                                        Large</option>
                                                    <option value="XL" {{ $product->size  == 'XL' ? 'selected' : '' }}>
                                                        Extra Large </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Conditions *</label>
                                            <div class="dropdown bootstrap-select form-control">
                                                <select name="condition" class="selectpicker form-control"
                                                    data-style="py-0">
                                                    <option value="">-- Conditions --</option>
                                                    <option value="new"
                                                        {{ $product->conditions  == 'new' ? 'selected' : '' }}>
                                                        new </option>
                                                    <option value="popular"
                                                        {{ $product->conditions  == 'popular' ? 'selected' : '' }}> popular
                                                    </option>
                                                    <option value="winter"
                                                        {{ $product->conditions  == 'winter' ? 'selected' : '' }}> winter
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Vendor *</label>
                                            <div class="dropdown bootstrap-select form-control">
                                                <select name="vendor_id" class="selectpicker form-control" data-style="py-0">
                                                    <option value="">-- Vendor --</option>
                                                    @foreach (\App\Models\User::where('role', 'vendor')->get() as $vendor)
                                                        <option value="{{ $vendor->id }}"  {{$vendor->id == $product->vendor_id?  'selected' : ''}} > {{ $vendor->full_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ $product->photo }}">
                                            </div>
                                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Trạng Thái *</label>
                                            <div class="dropdown bootstrap-select form-control">
                                                <select name="status" class="selectpicker form-control" data-style="py-0">
                                                    <option value="">--Trạng Thái --</option>
                                                    <option value="active"
                                                        {{  $product->status  == 'active' ? 'selected' : '' }}>
                                                        Kích Hoạt </option>
                                                    <option value="inactive"
                                                        {{  $product->status  == 'inactive' ? 'selected' : '' }}>Không Kích
                                                        Hoạt
                                                    </option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="myBtn" class="btn btn-primary">Cập Nhật </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>
    </div>

@endsection

@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script>
        $('#lfm').filemanager('image');
    </script>

    <script>
        $(document).ready(function() {
            $('#summary').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#myBtn').removeClass('disabled');
        });
    </script>

    <script>

        var child_cat_id = {{$product->child_cat_id}};
        $('#cat_id').change(function() {
            let cat_id = $(this).val();
            // let child = $('#child_cat_id');
            if (cat_id != null) {
                $.ajax({
                    url: "/admin/category/" + cat_id + "/child",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        cat_id: cat_id,
                    },
                    success: function(res) {
                        if (res.status) {
                            $("#child_cat_div").removeClass('d-none');
                            $.each(res.data, function(id, title) {
                                // https://developer.mozilla.org/en-US/docs/Web/API/HTMLOptionElement/Option  send params selected
                                var o = new Option(title, id, false, child_cat_id==id ? true:false );
                                $(o).html(title);
                                $("#child_cat_id").append(o);
                            });
                        } else {
                            $("#child_cat_div").addClass('d-none');
                        }

                    }
                })
            }
        })

        if (child_cat_id != null) {
            $('#cat_id').change()
        }
    </script>
@endsection
