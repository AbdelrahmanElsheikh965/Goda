@extends('Admin.master')

@section('title', 'Category Details . . .')
@section('small-title', 'Update or edit your category as you like :)')

@push('meta-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="box box-default color-palette-box">

            @include('Helpers_Views.message')

            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-save"></i> Update this category</h3>
            </div>
            <div class="box-body">
                <form role="form" id="form" action="{{url('/user/categories/update', [$category->id])}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        @include('Helpers_Views.errors')
                        <div class="form-group">
                            <label> Name </label>
                            <input type="text" name="name" class="form-control" placeholder="Name of the category" value="{{$category->name}}">
                        </div>
                        <button id="submitForm" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
