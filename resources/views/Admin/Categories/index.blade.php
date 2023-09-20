@extends('Admin.master')

@section('title', 'Categories Page')
@section('current-page', 'Categories')
@section('small-title', 'All of your store\'s categories')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box box-default color-palette-box">
            @include('Helpers_Views.message')
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-tag"></i> Categories List</h3>
            </div>
            <div class="box-body">

        <a href="{{url('/user/categories/create')}}" class="btn btn-primary"> <li class="fa fa-plus"></li> &nbsp; Add a new one</a>
            <br> <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th style="text-align: center">Edit</th>
                        <th style="text-align: center">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($categories as $category)
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td> {{$category->name}} </td>
                            <td style="text-align: center"> <a href="{{ url('user/categories/edit',[$category->id]) }}" class="btn btn-xs btn-warning fa fa-pencil"> Edit </a> </td>
                            <form action="{{ url('user/categories/delete',[$category->id]) }}" method="post">
                                @csrf @method('DELETE')
                                <td style="text-align: center"> <input type="submit" onclick="return confirm('Are you sure ?')" value="Delete" class="btn btn-xs btn-danger fa fa-trash"> </td>
                            </form>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
        </div>

            {{$categories->links()}}
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection

