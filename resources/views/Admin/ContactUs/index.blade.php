@extends('Admin.master')

@section('title', 'Contacts Page')
@section('current-page', 'Contact Us')
@section('small-title', 'Adjust your contact data')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-file-text-o"></i>
                        <h3 class="box-title">Settings</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('Helpers_Views.errors')
                        <form role="form" action="{{route('contactUs.update')}}" method="post">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label> Address </label>
                                    <textarea class="form-control" name="address" rows="3"> {{@$data->address}} </textarea>
                                </div>

                                <div class="form-group">
                                    <label> Phone </label>
                                    <input type="text" name="phone" class="form-control" value="{{@$data->phone}}">
                                </div>
                                <div class="form-group">
                                    <label> Email </label>
                                    <input type="text" name="email" class="form-control" value="{{@$data->email}}">
                                </div>
                                <button type="submit" class="btn btn-warning"> Update </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
@endsection
