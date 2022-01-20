<footer class="iq-footer mt-4" >
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-6 text-right">
                        <span class="mr-1">

                            <script>
                                document.write(new Date().getFullYear())
                            </script> ©
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Backend Bundle JavaScript -->
<script src="/template/assets/js/backend-bundle.min.js"></script>

<!-- Table Treeview JavaScript -->
<script src="/template/assets/js/table-treeview.js"></script>

<!-- Chart Custom JavaScript -->
<script src="/template/assets/js/customizer.js"></script>

<!-- Chart Custom JavaScript -->
<script async src="/template/assets/js/chart-custom.js"></script>

<!-- app JavaScript -->
<script src="/template/assets/js/app.js"></script>
{{-- summer note --}}

<script async src="/template/assets/summernote/summernote.js"></script>

{{-- swwithch button --}}
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
{{--  --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@yield('scripts')

<script>
    setTimeout(function() {
        $('#alert').slideUp();
    }, 3000);
</script>

<script>
    if ($.fn.dataTable.isDataTable('#DataTables_Table_0')) {
        table = $('#DataTables_Table_0').DataTable();
        table.destroy();
    } else {
        table = $('#example').DataTable({
            paging: false
        });
    }

</script>
