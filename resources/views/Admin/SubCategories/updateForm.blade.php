@extends('Admin.master')
@inject('categories','App\Models\Category')

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
                <h3 class="box-title"><i class="fa fa-save"></i> Update this sub-category</h3>
            </div>
            <div class="box-body">
                <form role="form" id="form" action="{{url('/user/sub-categories/update', [$subCategory->id])}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        @include('Helpers_Views.errors')
                        <div class="form-group">
                            <label> Name </label>
                            <input type="text" name="name" class="form-control" placeholder="Name of the sub-category" value="{{$subCategory->name}}">
                        </div>

                        <div class="form-group">
                            <label> Category Image </label>
                            <input type="text" name="image_name" value="Current Image: ( {{$subCategory->image}} )" class="form-control" disabled>
                            <input type="file" name="sub_category_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Category </label>
                            <select id="category" class="form-control" name="category_id">
                                @foreach($categories->getAll() as $category)
                                    <option value="{{$category->id}}" @selected($category->id === $subCategory->category->id)> {{$category->name}} </option>
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
