@extends('Admin.master')
@inject('subCategories','App\Models\SubCategory')
@section('title', 'Products Page')
@section('small-title', 'All of your store\'s products')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box box-default color-palette-box">
            @include('Helpers_Views.message')
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-tag"></i> Products List</h3>
            </div>
            <div class="box-body">
        @if($products->count() > 0)
        <a href="{{url('/user/products/create')}}" class="btn btn-primary"> <li class="fa fa-plus"></li> &nbsp; Add a new one</a>
            <br> <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th width="60px">Description</th>
                        <th width="100px">Cover Image</th>
                        <th width="150px" style="text-align: center">Category</th>
                        <th width="150px" style="text-align: center">Sub-Category</th>
                        <th width="150px" style="text-align: center">Price</th>
                        <th width="150px" style="text-align: center">Discount</th>
                        <th width="150px" style="text-align: center">size</th>
                        <th style="text-align: center">Edit</th>
                        <th style="text-align: center">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($products as $product)
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td> {{$product->name}} </td>
                            <td><textarea cols="30" rows="3" disabled>{{$product->description}}</textarea> </td>
                            <td width="150px"> <img src="{{asset('storage/images/'.$product->cover_image)}}" width="100px" height="90px"> </td>
                            <td style="text-align: center"> {{$product->subCategory->category->name}} </td>
                            <td style="text-align: center"> {{$product->subCategory->name}} </td>
                            <td style="text-align: center"> {{$product->price}} </td>
                            <td style="text-align: center"> {{$product->discount}} </td>
                            <td style="text-align: center">
                                <select name="" id="">
                                    @foreach($product->size as $size)
                                        <option>{{$size}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="text-align: center"> <a href="{{ route('products.edit',[$product->id]) }}" class="btn btn-xs btn-warning fa fa-pencil"> Edit </a> </td>
                            <form action="{{ route('products.destroy',[$product->id]) }}" method="post">
                                @csrf @method('DELETE')
                                <td style="text-align: center"> <input type="submit" onclick="return confirm('Are you sure ?')" value="Delete" class="btn btn-xs btn-danger fa fa-trash"> </td>
                            </form>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
        </div>

            @elseif($subCategories->count() == 0)
                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <blockquote>
                                <strong> 0Ops ! No SubCategories found
                                    you can add now </strong> &nbsp; &nbsp;
                                <a href="" class="btn btn-primary"> <li class="fa fa-plus"></li> &nbsp; Add a new sub-category !! </a>
                            </blockquote>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            @else
                    <div class="col-md-6">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <blockquote>
                                    <strong> 0Ops ! No Products found.</strong> &nbsp; &nbsp;
                                    <a href="{{url('/user/products/create')}}" class="btn btn-primary"> <li class="fa fa-plus"></li> &nbsp; Add a new product </a>
                                </blockquote>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                @endif
            {{$products->links()}}
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection

