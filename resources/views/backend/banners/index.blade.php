@extends('backend.layouts.master')

@section('content')

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="mb-3">Danh sách Banner</h4>
                        </div>
                        <a href="{{route('banner.create')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm
                            Banner</a>
                    </div>
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
                                   : activate to sort column descending" style="width: 63.4125px;">
                                            <div class="checkbox d-inline-block">
                                                <input type="checkbox" class="checkbox-input" id="checkbox1">
                                                <label for="checkbox1" class="mb-0"></label>
                                            </div>
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="Hình ảnh: activate to sort column ascending"
                                            style="width: 388.763px;">Hình ảnh</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="Mã: activate to sort column ascending"
                                            style="width: 148.6px;">Mã</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="Banner: activate to sort column ascending"
                                            style="width: 177.925px;">Banner</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Hành động: activate to sort column ascending"
                                            style="width: 233.3px;">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="ligth-body">
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <div class="checkbox d-inline-block">
                                                <input type="checkbox" class="checkbox-input" id="checkbox2">
                                                <label for="checkbox2" class="mb-0"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/template/assets/images/table/product/01.jpg"
                                                    class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                <div>
                                                    Organic Cream
                                                    <p class="mb-0"><small>This is test Product</small></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>CREM01</td>
                                        <td>Beauty</td>
                                        <td>
                                            <div class="d-flex align-items-center list-action">
                                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="View" href="page-list-category.html#"><i
                                                        class="ri-eye-line mr-0"></i></a>
                                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit" href="page-list-category.html#"><i
                                                        class="ri-pencil-line mr-0"></i></a>
                                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete" href="page-list-category.html#"><i
                                                        class="ri-delete-bin-line mr-0"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">
                                            <div class="checkbox d-inline-block">
                                                <input type="checkbox" class="checkbox-input" id="checkbox3">
                                                <label for="checkbox3" class="mb-0"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/template/assets/images/table/product/02.jpg"
                                                    class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                <div>
                                                    Rain Umbrella
                                                    <p class="mb-0"><small>This is test Product</small></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>UM01</td>
                                        <td>Grocery</td>
                                        <td>
                                            <div class="d-flex align-items-center list-action">
                                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="View" href="page-list-category.html#"><i
                                                        class="ri-eye-line mr-0"></i></a>
                                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit" href="page-list-category.html#"><i
                                                        class="ri-pencil-line mr-0"></i></a>
                                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete" href="page-list-category.html#"><i
                                                        class="ri-delete-bin-line mr-0"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <div class="checkbox d-inline-block">
                                                <input type="checkbox" class="checkbox-input" id="checkbox4">
                                                <label for="checkbox4" class="mb-0"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/template/assets/images/table/product/03.jpg"
                                                    class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                <div>
                                                    Serum Bottle
                                                    <p class="mb-0"><small>This is test Product</small></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>SEM01</td>
                                        <td>Beauty</td>
                                        <td>
                                            <div class="d-flex align-items-center list-action">
                                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="View" href="page-list-category.html#"><i
                                                        class="ri-eye-line mr-0"></i></a>
                                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit" href="page-list-category.html#"><i
                                                        class="ri-pencil-line mr-0"></i></a>
                                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete" href="page-list-category.html#"><i
                                                        class="ri-delete-bin-line mr-0"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">
                                            <div class="checkbox d-inline-block">
                                                <input type="checkbox" class="checkbox-input" id="checkbox5">
                                                <label for="checkbox5" class="mb-0"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/template/assets/images/table/product/04.jpg"
                                                    class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                <div>
                                                    Coffee Beans
                                                    <p class="mb-0"><small>This is test Product</small></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>COF01</td>
                                        <td>Food</td>
                                        <td>
                                            <div class="d-flex align-items-center list-action">
                                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="View" href="page-list-category.html#"><i
                                                        class="ri-eye-line mr-0"></i></a>
                                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit" href="page-list-category.html#"><i
                                                        class="ri-pencil-line mr-0"></i></a>
                                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete" href="page-list-category.html#"><i
                                                        class="ri-delete-bin-line mr-0"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <div class="checkbox d-inline-block">
                                                <input type="checkbox" class="checkbox-input" id="checkbox6">
                                                <label for="checkbox6" class="mb-0"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/template/assets/images/table/product/05.jpg"
                                                    class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                <div>
                                                    Book Shelves
                                                    <p class="mb-0"><small>This is test Product</small></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>FUN01</td>
                                        <td>Furniture</td>
                                        <td>
                                            <div class="d-flex align-items-center list-action">
                                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="View" href="page-list-category.html#"><i
                                                        class="ri-eye-line mr-0"></i></a>
                                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit" href="page-list-category.html#"><i
                                                        class="ri-pencil-line mr-0"></i></a>
                                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete" href="page-list-category.html#"><i
                                                        class="ri-delete-bin-line mr-0"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">
                                            <div class="checkbox d-inline-block">
                                                <input type="checkbox" class="checkbox-input" id="checkbox7">
                                                <label for="checkbox7" class="mb-0"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/template/assets/images/table/product/06.jpg"
                                                    class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                <div>
                                                    Dinner Set
                                                    <p class="mb-0"><small>This is test Product</small></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>DIS01</td>
                                        <td>Grocery</td>
                                        <td>
                                            <div class="d-flex align-items-center list-action">
                                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="View" href="page-list-category.html#"><i
                                                        class="ri-eye-line mr-0"></i></a>
                                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit" href="page-list-category.html#"><i
                                                        class="ri-pencil-line mr-0"></i></a>
                                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete" href="page-list-category.html#"><i
                                                        class="ri-delete-bin-line mr-0"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <div class="checkbox d-inline-block">
                                                <input type="checkbox" class="checkbox-input" id="checkbox8">
                                                <label for="checkbox8" class="mb-0"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/template/assets/images/table/product/07.jpg"
                                                    class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                <div>
                                                    Nike Shoes
                                                    <p class="mb-0"><small>This is test Product</small></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>NIS01</td>
                                        <td>Shoes</td>
                                        <td>
                                            <div class="d-flex align-items-center list-action">
                                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="View" href="page-list-category.html#"><i
                                                        class="ri-eye-line mr-0"></i></a>
                                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit" href="page-list-category.html#"><i
                                                        class="ri-pencil-line mr-0"></i></a>
                                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete" href="page-list-category.html#"><i
                                                        class="ri-delete-bin-line mr-0"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">
                                            <div class="checkbox d-inline-block">
                                                <input type="checkbox" class="checkbox-input" id="checkbox9">
                                                <label for="checkbox9" class="mb-0"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/template/assets/images/table/product/08.jpg"
                                                    class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                <div>
                                                    Computer Glasses
                                                    <p class="mb-0"><small>This is test Product</small></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>COG01</td>
                                        <td>Frames</td>
                                        <td>
                                            <div class="d-flex align-items-center list-action">
                                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="View" href="page-list-category.html#"><i
                                                        class="ri-eye-line mr-0"></i></a>
                                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit" href="page-list-category.html#"><i
                                                        class="ri-pencil-line mr-0"></i></a>
                                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete" href="page-list-category.html#"><i
                                                        class="ri-delete-bin-line mr-0"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <div class="checkbox d-inline-block">
                                                <input type="checkbox" class="checkbox-input" id="checkbox10">
                                                <label for="checkbox10" class="mb-0"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/template/assets/images/table/product/09.jpg"
                                                    class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                <div>
                                                    Alloy Jewel Set
                                                    <p class="mb-0"><small>This is test Product</small></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>AJS01</td>
                                        <td>Jewellery</td>
                                        <td>
                                            <div class="d-flex align-items-center list-action">
                                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="View" href="page-list-category.html#"><i
                                                        class="ri-eye-line mr-0"></i></a>
                                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit" href="page-list-category.html#"><i
                                                        class="ri-pencil-line mr-0"></i></a>
                                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete" href="page-list-category.html#"><i
                                                        class="ri-delete-bin-line mr-0"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>
       
    </div>

@endsection
