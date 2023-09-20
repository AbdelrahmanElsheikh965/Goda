@extends('Admin.master')
@inject('categories','App\Models\Category')
@inject('subCategories','App\Models\SubCategory')

@section('title', 'Product Details')
@section('small-title', 'Update or edit your product as you like :) ')

@push('meta-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="box box-default color-palette-box">

            @include('Helpers_Views.message')

            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-save"></i> Update this product</h3>
            </div>
            <div class="box-body">
                <form role="form" id="form" action="{{route('products.update', $product->id)}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        @include('Helpers_Views.errors')
                        <div class="form-group">
                            <label> Name </label>
                            <input type="text" name="name" class="form-control" placeholder="Name?"
                                   value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label> Description </label>
                            <textarea class="form-control" name="description" rows="3"
                                      placeholder="What is this product's description">{{$product->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label> Cover Image </label>
                            <input type="file" name="cover_image" class="form-control">
                            <label> 3 Optional Slides Images </label>
                            <input type="file" name="images[]" class="form-control" multiple>
                        </div>

                        <div class="form-group">
                            <label> Price </label>
                            <input type="text" name="price" class="form-control"
                                   placeholder="Type the product discount if found" value="{{$product->price}}">
                        </div>

                        <div class="form-group">
                            <label> Discount </label>
                            <input type="text" name="discount" class="form-control"
                                   placeholder="Type the product discount if found" value="{{$product->discount}}">
                        </div>

                        <div class="form-group">
                            <label for="">Insert your sizes</label>
                            <div class="row">
                                <div class="col-xs-3">
                                    <input id="size" type="text" class="form-control" placeholder="Type your size here">
                                </div>
                                <div class="col-xs-3">
                                    <button id="addSize" type="submit" class="btn btn-primary">Add &nbsp; <i
                                            class="fa fa-plus"></i></button>
                                </div>
                                <div class="col-xs-1">
                                    <button id="clearList" type="submit" class="btn btn-primary">Clear &nbsp; <i
                                            class="fa fa-trash"></i></button>
                                </div>
                                <div class="col-xs-3">
                                    <select id="listOfSizes" class="form-control">
                                        <option>-- <i> View Sizes </i> --</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label> Category </label>
                            <select id="category" class="form-control">
                                @foreach($categories->getAll() as $category)
                                    <option data-option="categoryOption"
                                            value="{{$category->id}}"
                                            @selected($category->id === $product->subCategory->category->id)>
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Sub-Category </label>
                            <select id="subCategory" class="form-control" name="sub_category_id">
                            </select>
                        </div>
                        <input type="hidden" id="productSizes" name="size">
                        <button id="submitForm" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script>
        (function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var numbersArray;

            $.ajax({
                url: '{{url('user/products/load')}}',
                type: 'POST',
                data: {_token: CSRF_TOKEN, productId: {{$product->id}}},
                success: function (response) {
                    // Parse the whole response data.
                    response = $.parseJSON(response);
                    // Parse only size array text to be real array.
                    numbersArray = $.parseJSON(response.data[0].size);
                    for (var i = 0; i < numbersArray.length; i++)
                    {
                        var option = "<option value='" + numbersArray[i] + "'>" + numbersArray[i] + "</option>";
                        $('#listOfSizes').append(option);
                    }
                }
            });

            $('#addSize').click(function (event) {
                var oneSize = $('#size').val();
                var option = "<option value='" + oneSize + "'>" + oneSize + "</option>";
                $('#listOfSizes').append(option);
                numbersArray.push(oneSize);
                console.log(numbersArray);
                event.preventDefault();
            });

            $('#clearList').click(function (event) {
                numbersArray = [];
                $('#listOfSizes').empty().append('<option>-- <i> View Sizes </i> --</option>');
                event.preventDefault();
            });

            $.ajax({
                url: '{{url('user/products/load')}}',
                type: 'POST',
                data: {_token: CSRF_TOKEN, categoryId: {{$product->subCategory->category->id}} },
                success: function (response) {
                    $('#subCategory').empty();
                    response = $.parseJSON(response);
                    for (var i = 0; i < response.num; i++) {
                        if ( {{$product->subCategory->id}} == response.data[i].id){
                            var option = "<option selected value='" + response.data[i].id + "'>" + response.data[i].sname + "</option>";
                        }
                        $('#subCategory').append(option);
                    }
                }
            });

            $('#category').change(function () {
                var categoryNewId = $('#category').find(":selected").val();
                $.ajax({
                    url: '{{url('user/products/load')}}',
                    type: 'POST',
                    data: {_token: CSRF_TOKEN, categoryId: categoryNewId},
                    success: function (response) {
                        $('#subCategory').empty();
                        response = $.parseJSON(response);
                        for (var i = 0; i < response.num; i++) {
                            var option = "<option value='" + response.data[i].id + "'>" + response.data[i].sname + "</option>";
                            $('#subCategory').append(option);
                        }
                    }
                });
            });

            $('#submitForm').click(function (event) {

                if (numbersArray.length === 0)
                {
                    alert('You forgot this product\'s sizes!');
                    event.preventDefault();
                }

                $('#productSizes').attr('value', numbersArray);
            });

        })();
    </script>

@endpush
