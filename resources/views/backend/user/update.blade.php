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
                            <form action="{{ route('user.update', $user->id) }}" method="POST" data-toggle="validator"
                                novalidate="true">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên Người Dùng *</label>
                                            <input type="text" class="form-control" required name="full_name"
                                                value="{{ $user->full_name }}">

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tên Đăng Nhập *</label>
                                            <input type="text" class="form-control" required name="username"
                                                value="{{ $user->username }}">

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" required name="email"
                                                value="{{ $user->email }}">
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Điện Thoại</label>
                                            <input type="text" class="form-control" required name="phone"
                                                value="{{ $user->phone }}">

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Địa Chỉ</label>
                                            <input type="text" class="form-control" required name="address"
                                                value="{{ $user->address }}">

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
                                                <input id="thumbnail" class="form-control" type="text"
                                                    value="{{ $user->photo }}" name="photo">
                                            </div>
                                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Role *</label>
                                            <div class="dropdown bootstrap-select form-control">
                                                <select name="role" class="selectpicker form-control" data-style="py-0">
                                                    <option value="">-- Role --</option>
                                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                                        admin </option>
                                                    <option value="vendor"
                                                        {{ $user->role == 'vendor' ? 'selected' : '' }}> vendor
                                                    </option>

                                                    <option value="customer"
                                                        {{ $user->role == 'customer' ? 'selected' : '' }}> customer
                                                    </option>
                                                </select>

                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Trạng Thái *</label>
                                            <div class="dropdown bootstrap-select form-control">
                                                <select name="status" class="selectpicker form-control" data-style="py-0">
                                                    <option value="">--Trạng Thái --</option>
                                                    <option value="active"
                                                        {{ $user->status == 'active' ? 'selected' : '' }}>
                                                        Kích Hoạt </option>
                                                    <option value="inactive"
                                                        {{ $user->status == 'inactive' ? 'selected' : '' }}>Không Kích
                                                        Hoạt
                                                    </option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2 "> Cập Nhật Người Dùng</button>
                                    <button type="reset" class="btn btn-danger">Tạo mới</button>
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
@endsection
