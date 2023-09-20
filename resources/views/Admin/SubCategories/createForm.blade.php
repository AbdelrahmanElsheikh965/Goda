@extends('Admin.master')
@inject('categories','App\Models\Category')

@section('title', 'Create a new sub-category . . .')
@section('small-title', 'Create a brand new sub-category')

@push('meta-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="box box-default color-palette-box">
            @include('Helpers_Views.message')
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-save"></i> Create a new sub-category</h3>
            </div>
            <div class="box-body">
                <form role="form" id="form" action="{{url('/user/sub-categories/store')}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @include('Helpers_Views.errors')
                        <div class="form-group">
                            <label> Name </label>
                            <input type="text" name="name" class="form-control" placeholder="Name of the sub-category" value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <label> Image </label>
                            <input type="file" name="sub_category_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Category </label>
                            <select id="category" class="form-control" name="category_id">
                                <option value="">-- Click to choose a category --</option>
                                @foreach($categories->getAll() as $category)
                                    <option data-option="categoryOption"
                                            value="{{$category->id}}"> {{$category->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <button id="submitForm" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
