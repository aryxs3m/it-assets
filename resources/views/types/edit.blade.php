@extends('layouts.app')

@section('content')

    <x-content-header title="Eszköztípusok">
        <li class="breadcrumb-item"><a href="/">IT-Assets</a></li>
        <li class="breadcrumb-item">Törzsadatok</li>
        <li class="breadcrumb-item">Eszköztípusok</li>
        <li class="breadcrumb-item active">{{ $model->name ?? 'Új' }}</li>
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
                            <h3 class="card-title">{{ $model->name ?? 'Új' }} eszköztípus</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/types/save" method="post">
                            @csrf

                            @if(!empty($model))
                                <input type="hidden" name="id" value="{{ $model->id }}">
                            @endif

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Név</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $model->name ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Leírás</label>
                                    <textarea name="description" id="description" class="form-control">{{ $model->description ?? '' }}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Mentés</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>

@endsection
