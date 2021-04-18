@extends('layouts.app')

@section('content')

    <x-content-header title="Eszközök">
        <li class="breadcrumb-item"><a href="/">IT-Assets</a></li>
        <li class="breadcrumb-item active">Eszközök</li>
    </x-content-header>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="mb-4">
                <a href="/devices/new" class="btn btn-success"><i class="fas fa-plus-circle"></i> Új</a>
            </div>

            <table id="datatable" class="table">
                <thead>
                    <th>Név</th>
                    <th>IP cím</th>
                    <th>Típus</th>
                    <th>Pozíció</th>
                    <th class="text-right">Műveletek</th>
                </thead>
                <tbody>
                    @foreach($types as $type)
                        <tr>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->ip }}</td>
                            <td>{{ $type->type->name }}</td>
                            <td>{{ $type->position->name }}</td>
                            <td class="text-right">
                                <a href="/devices/edit/{{ $type->id }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="/devices/delete/{{ $type->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>

@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/plugins/jszip/jszip.min.js"></script>
    <script src="/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function () {
            $('#datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
