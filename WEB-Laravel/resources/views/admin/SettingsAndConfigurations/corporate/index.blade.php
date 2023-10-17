@extends('layouts.admin.template')

@section('content')
<script>
    const DatatableBasic = function() {


        //
        // Setup module components
        //

        // Basic Datatable examples
        const _componentDatatableBasic = function() {
            if (!$().DataTable) {
                console.warn('Warning - datatables.min.js is not loaded.');
                return;
            }

            // Setting datatable defaults
            $.extend($.fn.dataTable.defaults, {
                autoWidth: false,
                columnDefs: [{
                    orderable: false,
                    width: 100,
                    targets: [5]
                }],
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    search: '<span class="me-3">Filter:</span> <div class="form-control-feedback form-control-feedback-end flex-fill">_INPUT_<div class="form-control-feedback-icon"><i class="ph-magnifying-glass opacity-50"></i></div></div>',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span class="me-3">Show:</span> _MENU_',
                    paginate: {
                        'first': 'First',
                        'last': 'Last',
                        'next': document.dir == "rtl" ? '&larr;' : '&rarr;',
                        'previous': document.dir == "rtl" ? '&rarr;' : '&larr;'
                    }
                }
            });

            // Basic datatable
            $('.datatable-basic').DataTable();

            // Alternative pagination
            $('.datatable-pagination').DataTable({
                pagingType: "simple",
                language: {
                    paginate: {
                        'next': document.dir == "rtl" ? 'Next &larr;' : 'Next &rarr;',
                        'previous': document.dir == "rtl" ? '&rarr; Prev' : '&larr; Prev'
                    }
                }
            });

            // Datatable with saving state
            $('.datatable-save-state').DataTable({
                stateSave: true
            });

            // Scrollable datatable
            const table = $('.datatable-scroll-y').DataTable({
                autoWidth: true,
                scrollY: 300
            });

            // Resize scrollable table when sidebar width changes
            $('.sidebar-control').on('click', function() {
                table.columns.adjust().draw();
            });
        };


        //
        // Return objects assigned to module
        //

        return {
            init: function() {
                _componentDatatableBasic();
            }
        }
    }();


    // Initialize module
    // ------------------------------

    document.addEventListener('DOMContentLoaded', function() {
        DatatableBasic.init();
    });
</script>
    <div class="card">
        <div class="card-header d-flex">
            <h5 class="mb-0">Daftar Perusahaan/Institusi</h5>
            <div class="ms-auto">
                <a class="btn btn-primary" href="{{ route('corporate.create') }}"><i class="ph-plus-circle"></i><span
                        class="d-none d-lg-inline-block ms-2">Tambah Perusahaan/Institusi</span></a>
            </div>
        </div>
        <table class="table datatable-basic table-striped">
            <thead>
                <tr>
                    <th>Kode Perusahaan/Institusi</th>
                    <th>Perusahaan/Institusi</th>
                    <th>Alamat</th>
                    <th>No.Telepon</th>
                    <th>Email</th>
                    <th class="text-center">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>IT DEL</td>
                    <td>lorem</td>
                    <td>lorem</td>
                    <td><span class="badge bg-success bg-opacity-10 text-success">Active</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item text-info">
                                        <i class="ph-list me-2"></i>
                                        Detail
                                    </a>
                                    <a href="#" class="dropdown-item text-secondary">
                                        <i class="ph-pencil me-2"></i>
                                        Edit
                                    </a>
                                    <a href="#" class="dropdown-item text-danger">
                                        <i class="ph-trash me-2"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Jackelyn</td>
                    <td>3 Oct 1981</td>
                    <td>lorem</td>
                    <td>lorem</td>
                    <td><span class="badge bg-secondary bg-opacity-10 text-secondary">Inactive</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item text-info">
                                        <i class="ph-list me-2"></i>
                                        Detail
                                    </a>
                                    <a href="#" class="dropdown-item text-secondary">
                                        <i class="ph-pencil me-2"></i>
                                        Edit
                                    </a>
                                    <a href="#" class="dropdown-item text-danger">
                                        <i class="ph-trash me-2"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Aura</td>
                    <td>19 Apr 1969</td>
                    <td>lorem</td>
                    <td>lorem</td>
                    <td><span class="badge bg-danger bg-opacity-10 text-danger">Suspended</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item text-info">
                                        <i class="ph-list me-2"></i>
                                        Detail
                                    </a>
                                    <a href="#" class="dropdown-item text-secondary">
                                        <i class="ph-pencil me-2"></i>
                                        Edit
                                    </a>
                                    <a href="#" class="dropdown-item text-danger">
                                        <i class="ph-trash me-2"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Nathalie</td>
                    <td>13 Dec 1977</td>
                    <td>lorem</td>
                    <td>lorem</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Pending</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item text-info">
                                        <i class="ph-list me-2"></i>
                                        Detail
                                    </a>
                                    <a href="#" class="dropdown-item text-secondary">
                                        <i class="ph-pencil me-2"></i>
                                        Edit
                                    </a>
                                    <a href="#" class="dropdown-item text-danger">
                                        <i class="ph-trash me-2"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Sharan</td>
                    <td>30 Dec 1991</td>
                    <td>lorem</td>
                    <td>lorem</td>
                    <td><span class="badge bg-secondary bg-opacity-10 text-secondary">Inactive</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item text-info">
                                        <i class="ph-list me-2"></i>
                                        Detail
                                    </a>
                                    <a href="#" class="dropdown-item text-secondary">
                                        <i class="ph-pencil me-2"></i>
                                        Edit
                                    </a>
                                    <a href="#" class="dropdown-item text-danger">
                                        <i class="ph-trash me-2"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Maxine</td>
                    <td>17 Oct 1987</td>
                    <td>lorem</td>
                    <td>lorem</td>
                    <td><span class="badge bg-info bg-opacity-10 text-info">Pending</span></td>
                    <td class="text-center">
                        <div class="d-inline-flex">
                            <div class="dropdown">
                                <a href="#" class="text-body" data-bs-toggle="dropdown">
                                    <i class="ph-list"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item text-info">
                                        <i class="ph-list me-2"></i>
                                        Detail
                                    </a>
                                    <a href="#" class="dropdown-item text-secondary">
                                        <i class="ph-pencil me-2"></i>
                                        Edit
                                    </a>
                                    <a href="#" class="dropdown-item text-danger">
                                        <i class="ph-trash me-2"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection

