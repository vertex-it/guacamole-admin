@extends('admin.layouts.master')

@section('title', __('Command groups'))

@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <div class="element-box">
                    <div class="table-responsive">
                        <div class="controls-above-table">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>@yield('title')</h5>
                                </div>
                                <div class="col-md-6">
                                    <a
                                        class="btn btn-small btn-primary pull-right"
                                        href="{{ route('admin.command-groups.create') }}"
                                    >
                                        @lang('Add new command group')
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table id="datatable" width="100%" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Commands')</th>
                                    <th>@lang('Created at')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('external-js')
    <script type="application/javascript">
        $(document).ready(function () {
            var table = $('#datatable').DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                deferRender: true,
                ajax: "{{ route('admin.command-groups.index') }}",
                columns: [
                    {data: "name"},
                    {data: "commands[, ].name", name: "commands.name"},
                    {data: "created_at", visible: false},
                    {data: "action", orderable: false, searchable: false}
                ],
                order: [[ 2, "desc" ]]
            });

            // $('#datatable_wrapper').removeClass('container-fluid');
            $('.btn-no-margin').css({'margin-left': 0});

            $(document).on('click', '.delete-button', function () {
                let button = $(this);

                $.confirm({
                    icon: 'os-icon os-icon-ui-15',
                    title: '@lang("Do you want to proceed?")',
                    content: '@lang("Delete action is permanent!")',
                    type: 'red',
                    buttons: {
                        confirm: {
                            text: '@lang("Delete")',
                            btnClass: 'btn-red',
                            action: function () {
                                $.ajax({
                                    url: button.data('route'),
                                    method: 'DELETE',
                                    success: function () {
                                        table.row(button.parents('tr')).remove().draw();
                                    }
                                });
                            }
                        },
                        cancel: {
                            text: '@lang("Cancel")',
                        }
                    }
                });
            });
        });
    </script>
@endsection
