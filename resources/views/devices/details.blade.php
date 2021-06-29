@extends('layouts.app')

@section('content')

    <x-content-header title="{{ $device->name }}">
        <li class="breadcrumb-item"><a href="/">IT-Assets</a></li>
        <li class="breadcrumb-item">Eszközök</li>
        <li class="breadcrumb-item active">{{ $device->name }}</li>
    </x-content-header>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="mb-4">
                <a href="/devices/new-service" class="btn btn-success"><i class="fas fa-plus-circle"></i> Új szolgáltatás</a>
            </div>

            <div class="row">
                <div class="col-2">
                    <div class="card">
                        <img src="/images/no-picture.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $device->name }}</h5>
                            <p class="card-text">{{ $device->type->name }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex">
                                <span class="flex-grow-1">{{ $device->ip }}</span>
                                <span>
                            <a href="http://{{ $device->ip }}"><i class="fas fa-globe"></i></a>
                        </span>
                            </li>
                            <li class="list-group-item">{{ $device->position->name }}</li>
                        </ul>
                        <div class="card-footer">
                            <a href="/devices/edit/{{ $device->id }}" class="card-link btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-10">


                    @if($device->type->ports > 0)

                    <div class="card">
                        <div class="card-body mb-0">

                            @for($x = 0; $x<$device->type->ports; $x++)
                                @if($x % 8 == 0)

                                    @if($x !== 0)
                                        </div>
                                        </div>
                                    @endif

                                    <div class="card mb-0" style="width:11.3rem; display:inline-block">
                                    <div class="card-body">
                                @endif
                                <button class="btn btn-dark btn-sm rounded-0 mb-1" style="width:32px">{{$x+1}}</button>
                            @endfor





                        </div>
                    </div>

                    @endif

                </div>
            </div>



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
