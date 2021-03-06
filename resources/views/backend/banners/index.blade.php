@extends('backend.layouts.master')

@section('content')

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="mb-3">{{$title}}|  Tổng :   {{ \App\Models\Banner::count() }} Banner</h4>
                        </div>
                        <a href="{{ route('banner.create') }}" class="btn btn-primary add-list"><i
                                class="las la-plus mr-3"></i>Thêm
                            Banner</a>
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
                                            rowspan="1" colspan="1" aria-sort="ascending" aria-label="
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
                                            rowspan="1" colspan="1" aria-label="Hình ảnh: activate to sort column ascending"
                                            style="width: 388.763px;">Description</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="Mã: activate to sort column ascending"
                                            style="width: 148.6px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="Banner: activate to sort column ascending"
                                            style="width: 177.925px;">Condition</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Hành động: activate to sort column ascending"
                                            style="width: 233.3px;">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="ligth-body">

                                    @foreach ($banners as $banner)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">
                                                <div class="checkbox d-inline-block">
                                                    {{ $index++ }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ $banner->photo }}"
                                                        class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                    <div>
                                                        {{ $banner->title }}
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="sorting_1">
                                                <div class="checkbox d-inline-block">
                                                   {!! $banner->description !!}
                                                </div>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{ $banner->id }}"
                                                    data-toggle="toggle" data-on="active" data-off="inactive"
                                                    {{ $banner->status == 'active' ? 'checked' : '' }}
                                                    data-onstyle="success" data-offstyle="danger">

                                            </td>
                                            <td>
                                                @if ($banner->conditions == 'promo')
                                                    <span class="badge badge-success"> {{ $banner->conditions }}</span>
                                                @else
                                                    <span class="badge badge-primary"> {{ $banner->conditions }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center list-action">
                                                    <a class="badge bg-success mr-2" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Edit"
                                                        href="{{ route('banner.edit', $banner->id) }}"><i
                                                            class="ri-pencil-line mr-0"></i></a>




                                                    <form method="POST"
                                                        action="{{ route('banner.destroy', $banner->id) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a class="dlt badge bg-warning mr-2" data-toggle="tooltip"
                                                            data-id="{{ $banner->id }}" data-placement="top"
                                                            title="delete" data-original-title="Delete"
                                                            href=""><i
                                                                class="ri-delete-bin-line mr-0"></i></a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{ $banners->render('backend.layouts.paginate') }}
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
                url: "{{ route('banner.status') }}",
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
