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
                            <form action="{{ route('category.update', $category->id) }}" method="POST"
                                data-toggle="validator" novalidate="true">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên category *</label>
                                            <input type="text" class="form-control" required name="title"
                                                value="{{ $category->title }}">

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mô Tả</label>
                                            <textarea class="form-control" name="summary" id="description"
                                                placeholder="Mô Tả"> {{ $category->description }}</textarea>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="">Is Parent: </label>
                                            <input id="is_parent" type="checkbox" name="is_parent"
                                                value="1"
                                                {{ $category->is_parent == true ? 'checked' : '' }}> Yes
                                        </div>
                                    </div>


                                    <div class="col-md-12  {{ $category->is_parent == 1 ? 'd-none' : '' }} "
                                        id="parent_cat_div">
                                        <div class="form-group">
                                            <label>Danh Mục Cha*</label>
                                            <div class="dropdown bootstrap-select form-control">
                                                <select name="parent_id" class="selectpicker form-control"
                                                    data-style="py-0">
                                                    <option value="">-- Danh Mục Cha --</option>
                                                    {{-- get parent id =1 --}}
                                                    @foreach ($parent_cats as $pcats)
                                                        <option value="{{ $pcats->id }}"
                                                            {{ $pcats->id == $category->parent_id ? 'selected' : ' ' }}>
                                                            {{ $pcats->title }}</option>
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
                                                <input id="thumbnail" class="form-control" type="text" name="photo"
                                                    value="{{ $category->photo }}">
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
                                                        {{ $category->status == 'active' ? 'selected' : '' }}>
                                                        Kích Hoạt </option>
                                                    <option value="inactive"
                                                        {{ $category->status == 'inactive' ? 'selected' : '' }}>Không
                                                        Kích
                                                        Hoạt
                                                    </option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-primary mr-2 disabled">Cập Nhật</button>
                                    <button type="reset" class="btn btn-danger">Xoá trống</button>
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
            $('#description').summernote();
        });
    </script>

    <script>
        $('#is_parent').change(function(e) {
            e.preventDefault();
            var is_checked = $('#is_parent').prop('checked');
            if (is_checked) {
                $('#parent_cat_div').addClass('d-none')
                $('#parent_cat_div').val('');

            } else {
                $('#parent_cat_div').removeClass('d-none')

            }
        })
    </script>
@endsection
