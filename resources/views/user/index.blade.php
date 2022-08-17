@extends('layouts.master')


@section('title')
    Members
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Home
        @endslot
        @slot('title')
            Members
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div id="toolbar">
                            {{-- <button class="btn btn-primary">Submit candidate</button> --}}
                        </div>
                    </div>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">

                            <table id="member_list_table" class="table table-striped" data-unique-id="id" data-toggle="table"
                                data-ajax="ajaxRequest" data-side-pagination="server" data-pagination="true"
                                data-total-field="count" data-data-field="items" data-show-columns="true"
                                data-show-toggle="false" data-filter-control="true" data-show-columns-toggle-all="true">
                                <thead>
                                    <tr>
                                        <th data-field="counter" data-sortable="true">{{ __('#') }}</th>
                                        <th data-field="member_id" data-filter-control="input" data-sortable="true">
                                            {{ __('Member ID') }}</th>
                                        <th data-field="full_name" data-filter-control="input" data-sortable="true">
                                            {{ __('Full Name') }}</th>
                                        <th data-field="entry_type" data-filter-control="input" data-sort-name="entry_type"
                                            data-flat="true" data-sortable="true">{{ __('Entry As') }}</th>
                                        <th data-field="mobile_no" data-filter-control="input" data-sortable="true">
                                            {{ __('Mobile No') }}</th>
                                        <th data-field="instagram_id" data-filter-control="input" data-sortable="true">
                                            {{ __('Instagram ID') }}</th>
                                        <th data-field="photo" data-filter-control="input" data-sortable="true">
                                            {{ __('Photo') }}</th>
                                        <th data-field="status" data-filter-control="select" data-sortable="true">
                                            {{ __('Status') }}</th>
                                        <th data-field="created_at">{{ __('Created At') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Change Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="photo_edit" enctype="multipart/form-data" method="POST">
                        @csrf
                        <label for="mobile_no" class="form-label">Photo</label>
                        <input type="hidden" class="form-control" id="modal_member_id" name="modal_member_id">
                        <input type="file" class="form-control" id="file" autocomplete="off" name="file"
                            required>
                        @error('photo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="close_modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="uploadPhoto()">Upload</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Responsive Table js -->
    {{-- <script src="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.js') }}"></script> --}}

    <!-- Init js -->
    {{-- <script src="{{ URL::asset('/assets/js/pages/table-responsive.init.js') }}"></script> --}}

    <link href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css" rel="stylesheet">


    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/export/bootstrap-table-export.min.js"></script>
    <script
        src="https://unpkg.com/bootstrap-table@1.18.3/dist/extensions/filter-control/bootstrap-table-filter-control.min.js">
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js">
    </script>
    {{-- <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script> --}}
    {{-- <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/extensions/export/bootstrap-table-export.min.js"></script> --}}

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>



    <script>
        var $table = $('#member_list_table');
        $table.bootstrapTable({
            toolbar: '#toolbar',
            columns: [{
                field: 'counter',
                title: '#'
            }, {}, {}, {}, {}, {}, {}, {}, {
                field: 'operate',
                title: 'Action',
                align: 'center',
                valign: 'middle',
                clickToSelect: false,
                formatter: function(value, row, index) {
                    let status = row.status == 'Approved' ? 'Reject' : 'Approve';
                    let status_value = row.status == 'Approved' ? 'Rejected' : 'Approved';
                    var class_name = row.status == 'Approved' ? 'btn-danger' : 'btn-primary';
                    let action =
                        `<button type="button" onClick="changeStatus(${row.id}, ${index}, '${status_value}')" class="btn btn-sm ` +
                        class_name + `">` + status + `</button>`;
                    return action;
                }
            }]
        });

        function ajaxRequest(params) {
            var url = "{{ route('user.register.server_side') }}"
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
            })
        }

        function changeStatus(id, index, status) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, Change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('user.change_status', ['id' => ':queryId']) }}";
                    url = url.replace(':queryId', id);
                    $.ajax({
                        url: url,
                        type: "get",
                        data: {
                            status: status
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data, textStatus, jqXHR) {
                            if (data.success) {
                                $table.bootstrapTable('refresh');
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal
                                            .resumeTimer)
                                    }
                                })
                                Toast.fire({
                                    icon: 'success',
                                    title: data.message
                                });

                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);
                        }
                    });
                }
            })

        }

        window.tableFilterStripHtml = function(value) {
            return value.replace(/<[^>]+>/g, '').trim();
        }

        $(document).on('change', '.bt_filter', function(e) {
            let value = $(this).val();
            let field = $(this).data("field");

            let arr = {};
            $('.bt_filter').each(function(index, element) {
                if ($(element).val()) {
                    arr[$(element).data('field')] = $(element).val();
                }
            })

            let data = {
                filter: JSON.stringify({
                    // [field]: value
                    field: arr
                })
            }

            var url = "{{ route('user.register.server_side') }}"
            $.ajax({
                method: 'GET',
                dataType: 'json',
                url: url + "?" + $.param(data),
                success: function(response) {
                    $table.bootstrapTable('load', response);
                }
            });
        })

        function remove(id, index) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = "{{ route('user.register.server_side', ':id') }}";
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: "get",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data, textStatus, jqXHR) {
                            if (data.success) {
                                $table.bootstrapTable('removeByUniqueId', id);

                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal
                                            .resumeTimer)
                                    }
                                })
                                Toast.fire({
                                    icon: 'success',
                                    title: data.message
                                });

                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);
                        }
                    });
                }
            })

        }

        function uploadPhoto() {
            var form = $("#photo_edit");
            form.validate({
                errorPlacement: function errorPlacement(error, element) {
                    element.after(error);
                },
                rules: {
                    mobile_no: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true
                    },
                    ref_number: {
                        required: false,
                        number: true
                    }
                }
            });
            form_data = new FormData(form[0]);
            $.ajax({
                type: 'POST',
                url: '{{ route('user.photo.edit') }}',
                data: form_data,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    if (res.success) {
                        $('#close_modal').trigger('click');
                        $table.bootstrapTable('refresh');
                    }
                    // console.log("res",res);
                },
                error: function() {
                    console.log("Something went wrong!");
                }
            });
        }

        function setId(member_id) {
            $('#modal_member_id').val(member_id);
        }
    </script>
    @if (Session::has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('success') }}"
            })
        </script>
    @endif
@endsection
