@extends('layouts.master')
@section('heading')
    <h1>@lang('user.titles.all')</h1>
@stop

@section('content')

    <table class="table table-hover " id="users-table">
        <thead>
        <tr>
            <th>@lang('user.headers.name')</th>
            <th>@lang('user.headers.mail')</th>
            <th>@lang('user.headers.work_number')</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
    </table>

@stop

@push('scripts')
<script>
    $(function () {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('users.data') !!}',
            columns: [

                {data: 'namelink', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'work_number', name: 'work_number'},
                    @if(Entrust::can('user-update'))
                {
                    data: 'edit', name: 'edit', orderable: false, searchable: false
                },
                    @endif
                    @if(Entrust::can('user-delete'))
                {
                    data: 'delete', name: 'delete', orderable: false, searchable: false
                },
                @endif
            ]
        });
    });
</script>
@endpush
