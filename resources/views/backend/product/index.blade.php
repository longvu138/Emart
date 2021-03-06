@extends('backend.layouts.master')

@section('content')

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>

                            <h4 style="font-size: 20px" class="mb-3">{{ $title }} | Tổng :
                                {{ \App\Models\Product::count() }} Sản Phẩm</h4>
                        </div>
                        <a href="{{ route('product.create') }}" class="btn btn-primary add-list"><i
                                class="las la-plus mr-3"></i>Thêm
                            product</a>
                    </div>
                </div>
                <div class="col-sm-12">
                    @include('backend.layouts.notification')
                </div>

                <div class="col-lg-12">
                    <div class="table-responsive rounded mb-3">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                            <table class="data-table table mb-0 tbl-server-info dataTable no-footer" id="DataTables_Table_0"
                                role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead class="bg-white text-uppercase">
                                    <tr class="ligth ligth-data" role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="
                                                                                                                                                                                                                   : activate to sort column descending"
                                            style="width: 63.4125px;">
                                            <div class="checkbox d-inline-block">

                                                <label for="checkbox1" class="mb-0">STT</label>
                                            </div>
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="Hình ảnh: activate to sort column ascending"
                                            style="width: 388.763px;">Hình ảnh</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="Mã: activate to sort column ascending"
                                            style="width: 148.6px;">price</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="Mã: activate to sort column ascending"
                                            style="width: 148.6px;">discount</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="Mã: activate to sort column ascending"
                                            style="width: 148.6px;">Size</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="Mã: activate to sort column ascending"
                                            style="width: 148.6px;">Conditions</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="Mã: activate to sort column ascending"
                                            style="width: 148.6px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Hành động: activate to sort column ascending"
                                            style="width: 233.3px;">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="ligth-body">

                                    @foreach ($products as $product)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">
                                                <div class="checkbox d-inline-block">
                                                    {{ $index++ }}
                                                </div>
                                            </td>
                                            <td>
                                                @php
                                                    $photo = explode(',', $product->photo);
                                                @endphp
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ $photo[0] }}" class="img-fluid rounded avatar-50 mr-3"
                                                        alt="image">
                                                    <div>
                                                        {{ $product->title }}

                                                    </div>
                                                </div>
                                            </td>


                                            <td class="sorting_1">
                                                <div class="checkbox d-inline-block">
                                                    {{ number_format($product->price, 2) }}
                                                </div>
                                            </td>

                                            <td class="sorting_1">
                                                <div class="checkbox d-inline-block">
                                                    {{ number_format($product->discount, 2) }}
                                                </div>
                                            </td>

                                            <td class="sorting_1">
                                                <div class="checkbox d-inline-block">
                                                    {{ $product->size }}
                                                </div>
                                            </td>

                                            <td>
                                                @if ($product->conditions == 'new')
                                                    <span class="badge badge-success"> {{ $product->conditions }}</span>
                                                @elseif($product->conditions == 'popular')
                                                    <span class="badge badge-warning"> {{ $product->conditions }}</span>

                                                @else
                                                    <span class="badge badge-primary"> {{ $product->conditions }}</span>
                                                @endif
                                            </td>

                                            <td>
                                                <input type="checkbox" name="toogle" value="{{ $product->id }}"
                                                    class="toggle" data-toggle="toggle" data-on="active"
                                                    data-off="inactive"
                                                    {{ $product->status == 'active' ? 'checked' : '' }}
                                                    data-onstyle="success" data-offstyle="danger">
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center list-action">
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Edit"
                                                        href="{{ route('product.edit', $product->id) }}"><i
                                                            class="ri-pencil-line mr-0"></i></a>


                                                    <a class="badge bg-secondary mr-2" data-toggle="modal"
                                                        data-target="#productID{{ $product->id }}"
                                                        href="javascript:void(0)"><i class="ri-eye-fill"></i></a>

                                                    <form method="POST"
                                                        action="{{ route('product.destroy', $product->id) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a class="dlt badge bg-warning mr-2" data-toggle="tooltip"
                                                            data-id="{{ $product->id }}" data-placement="top"
                                                            title="delete" data-original-title="Delete" href=""><i
                                                                class="ri-delete-bin-line mr-0"></i></a>
                                                    </form>
                                                </div>
                                            </td>

                                            {{-- model --}}

                                            <!-- Modal -->
                                            <div class="modal fade" id="productID{{ $product->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    @php
                                                        $product = \App\Models\Product::where('id', $product->id)->first();
                                                        
                                                    @endphp

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title font-weight-bold text-uppercase"
                                                                id="exampleModalLongTitle">
                                                                {{ $product->title }}</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <strong>Tóm Tắt</strong>
                                                            <p> {!! html_entity_decode($product->summary) !!} </p>

                                                            <strong>Mô Tả</strong>
                                                            <p> {!! html_entity_decode($product->description) !!} </p>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Giá Tiền</strong>
                                                                    <p> {{ number_format($product->price, 2) }}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong> Giá Đã Giảm </strong>
                                                                    <p> {{ $product->offer_price }}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong> Stock </strong>
                                                                    <p> {{ $product->stock }}</p>
                                                                </div>
                                                            </div>
                                                            <hr>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong> Danh Mục</strong>
                                                                    <p> {{ \App\Models\Category::where('id', $product->cat_id)->value('title') }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Danh Mục Con</strong>
                                                                    <p> {{ \App\Models\Category::where('id', $product->child_cat_id)->value('title') }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Brand</strong>
                                                                    <p> {{ \App\Models\Brand::where('id', $product->brand_id)->value('title') }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <hr>


                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <strong>Size</strong>
                                                                    <p class="badge badge-success"> {{ $product->size }}
                                                                    </p>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <strong>Conditions</strong>
                                                                    <p class="badge badge-primary">
                                                                        {{ $product->conditions }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Status</strong>
                                                                    <p class="badge badge-warning">
                                                                        {{ $product->status }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{ $products->render('backend.layouts.paginate') }}
            <!-- Page end  -->
        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //  bắt sự kiện click btn delete
        $('.dlt').click(function(e) {

            let form = $(this).closest('form');
            let dataId = $(this).data('id');
            e.preventDefault();
            swal({
                    title: "Bạn có chắc chắn muốn xoá?",
                    text: "Sau khi xoá dữ liệu sẽ không thể khôi phục!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                        swal("Bạn đã xoá thành công", {
                            icon: "success",
                        });
                    } else {
                        swal("tập chưa bị xoá!");
                    }
                });
        })
    </script>




    <script>
        $('input[name=toogle]').change(function() {
            let mode = $(this).prop('checked');
            let id = $(this).val();

            $.ajax({
                url: "{{ route('product.status') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id,
                },
                success: function(response) {
                    if (response.status) {
                        alert(response.msg);

                    } else {
                        alert('Cập nhật Status không thành công');

                    }
                }
            })
        })
    </script>
@endsection
