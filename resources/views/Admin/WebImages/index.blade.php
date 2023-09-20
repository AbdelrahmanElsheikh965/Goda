@extends('Admin.master')

@section('title', 'Web Images Page')
@section('current-page', 'Web Images')
@section('small-title', 'Adjust your images in the client side')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-file-text-o"></i>
                        <h3 class="box-title">Header 3 Images</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" id="para-form" action="{{route('webImages.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label> Header Image #1 </label>
                                    <input type="file" name="image[{{@$webImages[0]}}]" class="form-control">

                                    <label> Header Image #2 </label>
                                    <input type="file" name="image[{{@$webImages[1]}}]" class="form-control">

                                    <label> Header Image #3 </label>
                                    <input type="file" name="image[{{@$webImages[2]}}]" class="form-control">
                                </div>
                            </div>
                            <button type="submit" form="para-form" formtarget="para-form" class="btn btn-warning"> Update </button>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-file-text-o"></i>
                        <h3 class="box-title">About Us Image </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label> About Us Image #1 </label>
                            <input type="file" name="image[{{@$webImages[3]}}]" class="form-control">
                        </div>
                        @include('Helpers_Views.errors')
                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            </form>
            <!-- /.col -->
            </div>

    </section>
    <!-- /.content -->
@endsection
