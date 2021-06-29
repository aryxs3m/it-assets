@extends('layouts.app')

@section('content')

    <x-content-header title="Eszközök">
        <li class="breadcrumb-item"><a href="/">IT-Assets</a></li>
        <li class="breadcrumb-item">Eszközök</li>
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
                            <h3 class="card-title">{{ $model->name ?? 'Új' }} eszköz</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/devices/save" method="post">
                            @csrf

                            @if(!empty($model))
                                <input type="hidden" name="id" value="{{ $model->id }}">
                            @endif

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Hosztnév</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $model->name ?? '' }}">
                                </div>
                                {{--<div class="form-group">
                                    <label for="product_id">Eszköz modell</label>
                                    <select id="product_id" name="product_id" class="form-control"></select>
                                </div>--}}
                                <div class="form-group">
                                    <label for="ip">IP cím</label>
                                    <input type="text" class="form-control" id="ip" name="ip" value="{{ $model->ip ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Leírás</label>
                                    <textarea name="description" id="description" rows="10" class="form-control">{{ $model->description ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="type_id">Típus</label>
                                    <select name="type_id" id="type_id" class="form-control">
                                        @foreach(\App\Models\DeviceType::all() as $dt)
                                            <option value="{{ $dt->id }}" @if(!empty($model->id) && $model->type_id == $dt->id) selected @endif>{{ $dt->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="position_id">Pozíció</label>
                                    <select name="position_id" id="position_id" class="form-control">
                                        @foreach(\App\Models\Position::all() as $dt)
                                            <option value="{{ $dt->id }}" @if(!empty($model->id) && $model->position_id == $dt->id) selected @endif>{{ $dt->name }}</option>
                                        @endforeach
                                    </select>
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

@push('scripts')
    {{--<script>
        $(document).ready(function(){
            $('#product_id').select2({
                ajax: {
                    url: '/products/select2',
                    dataType: 'json'
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                },
                tags: true
            });
        })
    </script>--}}
@endpush
