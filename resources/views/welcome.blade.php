@extends('layouts.app')

@section('content')

    <x-content-header title="Kezdőlap">
        <li class="breadcrumb-item"><a href="#">IT-Assets</a></li>
        <li class="breadcrumb-item active">Kezdőlap</li>
    </x-content-header>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-laptop-house"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Minden eszköz</span>
                            <span class="info-box-number">
                            {{ $deviceCount }}
                            <small>db</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                @foreach($deviceTypes as $dt)
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-server"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">{{ $dt->name }}</span>
                                <span class="info-box-number">
                                {{ $dt->devices->count() }}
                                <small>db</small>
                            </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                @endforeach

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>

@endsection
