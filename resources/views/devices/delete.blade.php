@extends('layouts.app')

@section('content')

    <x-content-header title="Eszközök">
        <li class="breadcrumb-item"><a href="/">IT-Assets</a></li>
        <li class="breadcrumb-item">Eszközök</li>
        <li class="breadcrumb-item active">{{ $model->name }} törlése</li>
    </x-content-header>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $model->name }} törlése</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/devices/delete/{{ $model->id }}" method="post">
                            @csrf

                            <div class="card-body">
                                <p class="mb-0">Biztos törlöd?</p>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger">Törlés</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>

@endsection
