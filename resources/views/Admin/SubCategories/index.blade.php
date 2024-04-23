@extends('Admin.master')

@section('title', 'Sub-categories Page')
@section('current-page', 'Sub-categories')
@section('small-title', 'All of your store\'s sub-categories')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box box-default color-palette-box">
            @include('Helpers_Views.message')
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-tag"></i> Sub-categories List</h3>
            </div>
            <div class="box-body">

        <a href="{{url('/user/sub-categories/create')}}" class="btn btn-primary"> <li class="fa fa-plus"></li> &nbsp; Add a new one</a>
            <br> <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>According Category</th>
                        <th style="text-align: center">Edit</th>
                        <th style="text-align: center">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($subCategories as $subCategory)
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td> {{$subCategory->name}} </td>
                            <td width="150px"> <img src="{{$subCategory->image}}" width="100px" height="90px"> </td>
                            <td> {{$subCategory->category->name}} </td>
                            <td style="text-align: center"> <a href="{{ url('user/sub-categories/edit',[$subCategory->id]) }}" class="btn btn-xs btn-warning fa fa-pencil"> Edit </a> </td>
                            <form action="{{ url('user/sub-categories/delete',[$subCategory->id]) }}" method="post">
                                @csrf @method('DELETE')
                                <td style="text-align: center"> <input type="submit" onclick="return confirm('Are you sure ?')" value="Delete" class="btn btn-xs btn-danger fa fa-trash"> </td>
                            </form>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
        </div>

            {{$subCategories->links()}}
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection

