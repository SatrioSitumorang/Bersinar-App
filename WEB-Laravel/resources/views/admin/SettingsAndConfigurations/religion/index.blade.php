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
                        targets: [2]
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
            <h5 class="mb-0">Daftar Agama</h5>
            <div class="ms-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal_default_tabCreate"><i class="ph-plus-circle"></i><span
                        class="d-none d-lg-inline-block ms-2">Tambah Agama</span></button>
            </div>
        </div>
        <table id="agamaTable" class="table datatable-basic table-striped">
            <thead>
                <tr>
                    <th>Agama</th>
                    <th>Keterangan</th>
                    <th class="text-center">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($religions as $agama)
                    <tr id="table_row_${{ $agama->religionId }}">
                        <td>{{ $agama->religionName }}</td>
                        <td>{{ $agama->description }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="text-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" class="dropdown-item text-info detail-button"
                                            data-bs-toggle="modal" data-bs-target="#modal_detail_{{ $agama->religionId }}">
                                            <i class="ph-list me-2"></i>
                                            Detail
                                        </a>
                                        <a href="#" class="dropdown-item text-secondary edit-button"
                                            onclick="editReligion({{ $agama->religionId }})"
                                            data-id="{{ $agama->religionId }}">
                                            <i class="ph-pencil me-2"></i>
                                            Edit
                                        </a>
                                        <a href="#" class="dropdown-item text-danger"
                                            onclick="confirmDelete({{ $agama->religionId }})">
                                            <i class="ph-trash me-2"></i>
                                            Hapus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Create Modal --}}
        <div id="modal_default_tabCreate" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Agama</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form id="addReligionForm">
                        @csrf
                        <div class="modal-body">
                            <div class="container">
                                <div class="row mb-2">
                                    <label class="col-lg-4 col-form-label">Nama Agama:</label>
                                    <div class="col-lg-7">
                                        <input type="text" name="religionName" class="form-control"
                                            placeholder="Masukkan Agama">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-lg-4 col-form-label">Keterangan:</label>
                                    <div class="col-lg-7">
                                        <textarea rows="3" cols="3" name="description" class="form-control" placeholder="Masukkan Keterangan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Update Modal --}}
        @foreach ($religions as $agama)
            <div id="modal_default_tabUpdate" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Agama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form id="updateReligionForm">
                            @csrf
                            <input type="hidden" name="religionId" id="updateReligionId">
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row mb-2">
                                        <label class="col-lg-4 col-form-label">Nama Agama:</label>
                                        <div class="col-lg-7">
                                            <input type="text" name="religionName" class="form-control"
                                                placeholder="Masukkan Agama" value="{{ $agama->religionName }}">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="col-lg-4 col-form-label">Keterangan:</label>
                                        <div class="col-lg-7">
                                            <textarea rows="3" cols="3" name="description" class="form-control" placeholder="Masukkan Keterangan">{{ $agama->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Detail Modal --}}
        @foreach ($religions as $agama)
            <div id="modal_detail_{{ $agama->religionId }}" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Agama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row mb-2">
                                    <label for="detail_religion_name" class="col-lg-4 col-form-label">Nama
                                        Agama:</label>
                                    <div class="col-lg-7">
                                        <label id="detail_religion_name"
                                            class="col-form-label">{{ $agama->religionName }}</label>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="detail_religion_description"
                                        class="col-lg-4 col-form-label">Keterangan:</label>
                                    <div class="col-lg-7">
                                        <label id="detail_religion_description"
                                            class="col-form-label">{{ $agama->description }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @foreach ($religions as $agama)
        <form id="delete-form-{{ $agama->religionId }}" action="{{ route('religion.hapus', $agama->religionId) }}"
            method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

    <script>
        function addReligion() {
            const notyWarning = new Noty({
                text: "Kedua field harus diisi sebelum mengirimkan form.",
                type: "warning",
                progressBar: false,
                layout: 'topCenter',
                // timeout: 3000,
            });

            $("#addReligionForm").on("submit", function(e) {
                e.preventDefault();
                let religionNameValue = $("input[name='religionName']").val();
                let descriptionValue = $("textarea[name='description']").val();

                if (religionNameValue.trim() !== "" && descriptionValue.trim() !== "") {
                    let formData = $(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: 'agama/store',
                        data: formData,
                        success: function(data) {
                            $("#modal_default_tabCreate").modal("hide");
                            $("#addReligionForm")[0].reset();

                            console.log(formData);
                            location.reload();
                        },
                        error: function(data) {
                            console.error("Error:", data);
                        },
                    });
                } else {
                    notyWarning.show();
                }
            });
        }


        $('#updateReligionForm').on('submit', function(e) {
            e.preventDefault();
            const id = $('#updateReligionId').val();
            let formData = $(this).serialize();
            const url = 'agama/update/' + id;
            $.ajax({
                type: 'POST',
                url: url,
                data: formData + "&_method=PUT",
                success: function(data) {
                    $('#modal_default_tabUpdate').modal('hide');
                    $(`#table_row_${id} td:nth-child(1)`).text($(
                        '#updateReligionForm input[name="religionName"]').val());
                    $(`#table_row_${id} td:nth-child(2)`).text($(
                        '#updateReligionForm textarea[name="description"]').val());
                    console.log('Update Successful:', data);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        });

        function editReligion(id) {
            const url = 'agama/edit/' + id;
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    $('#updateReligionId').val(id);
                    $('#updateReligionForm input[name="religionName"]').val(data.religionName);
                    $('#updateReligionForm textarea[name="description"]').val(data.description);
                    $('#modal_default_tabUpdate').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        }


        $(document).ready(function() {
            addReligion();

            $('#agamaTable').on('click', '.edit-button', function() {
                const id = $(this).data('id');
                editReligion(id);
            });

            $('#updateReligionForm').on('submit', function(e) {
                e.preventDefault();
                const id = $('#modal_default_tabUpdate').find('.edit-button').data('id');
            });
        });
    </script>
@endsection
