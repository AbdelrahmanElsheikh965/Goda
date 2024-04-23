@extends('Web.app')
@inject('productObject','App\ECommerce\Product\Models\Product')

@push('meta-token')
    <meta id="tokenMeta" name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{ $product->cover_image }}" alt="First slide"> </div>
                            @if($product->images->count())
                                <div class="carousel-item"> <img class="d-block w-100" src="{{ $product->images[0]->image }}" alt="Second slide"> </div>
                                @if($product->images->count() > 1)
                                    <div class="carousel-item"> <img class="d-block w-100" src="{{ $product->images[1]->image }}" alt="Third slide"> </div>
                                @endif
                            @endif
                        </div>

                        @if($product->images->count())
                            <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                            </a>
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                    <img class="d-block w-100 img-fluid" src="{{ $product->cover_image }}" alt="" />
                                </li>

                                    <li data-target="#carousel-example-1" data-slide-to="1">
                                        <img class="d-block w-100 img-fluid" src="{{ $product->images[0]->image }}" alt="" />
                                    </li>
                                @if($product->images->count() > 1)
                                    <li data-target="#carousel-example-1" data-slide-to="2">
                                        <img class="d-block w-100 img-fluid" src="{{ $product->images[1]->image }}" alt="" />
                                    </li>
                                @endif
                            </ol>
                        @endif

                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2> {{$product->name}} </h2>
                        <h5> {!! $product->discount ? "<del>$ " .$product->price ."</del> " . $product->price - ($product->price * $product->discount) : $product->price !!} </h5>
                        <p>
                        <h4>Short Description:</h4>
                        <p> {{$product->description}}</p>
                        <ul>
                            <li>
                                <div class="form-group size-st">
                                    <label class="size-label">Size</label>
                                    <select id="basic" class="selectpicker show-tick form-control">
                                        @foreach($product->size as $size)
                                            <option value="1"> {{$size}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="form-group quantity-box">
                                    <label class="control-label">Quantity</label>
                                    <input class="form-control" value="1" id="quantity" min="1" max="20" type="number">
                                </div>
                            </li>
                        </ul>

                        <div class="add-to-btn">
                            <div class="add-comp">
                                <a class="btn hvr-hover wishlistItem" id="addToWishlist" data-id="{{$product->id}}" href=""> <i class="fas fa-heart"></i> Add to wishlist</a>
                                <a class="btn hvr-hover" id="addToCartSubmit" href=""> <i class="fas fa-shopping-cart"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-12">
                    @if($productObject->related($product)[0]->count())
                    <div class="title-all text-center">
                        <h1>Related Products </h1>
                        <p> These products are within the same sub-category of the above one </p>
                    </div>

                    @foreach($productObject->related($product)[0] as $relatedProduct)
                        <div class="col-lg-3 col-md-6 special-grid best-seller">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <div class="type-lb">
                                        @if($relatedProduct->discount) <p class="sale">Sale</p> @endif
                                    </div>
                                    <img src="{{asset('images/'.$relatedProduct->cover_image)}}" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="{{route('products.show', $relatedProduct->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li>
                                                <a href="" class="wishlistItem" data-toggle="tooltip" id="addToWishlist" data-id="{{$relatedProduct->id}}"
                                                   data-placement="right" title="Add to Wishlist">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4> <a href="{{route('products.show', $relatedProduct->id)}}"> {{$relatedProduct->name}} </a> </h4>
                                    <h5> {{$relatedProduct->price}} </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @else
                        <div class="title-all text-center">
                            <h1> No related products yet </h1>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

@endsection


@push('jQuery-Ajax')
    <script src="{{asset('jquery-2.2.4.js')}}" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        (function () {
            $('#addToCartSubmit').click(function (event) {
                var data = {
                    product_id: {{$product->id}},
                    quantity: $("#quantity").val(),
                    _token: $('meta#tokenMeta').attr('content')
                };
                $.ajax({
                    url:  '{{url('/add-to-cart')}}',
                    type: 'POST',
                    data: data,
                    success: function (message) {
                        alert(message);
                    },
                    error: (error) => {
                        alert("Something wrong happened, If you aren't signed in, then you should sign in first");
                    }
                });
               event.preventDefault();
            });

            $('a.wishlistItem').click(function (event) {
                var data = {
                    product_id: $(this).data('id'),
                    _token: $('meta#tokenMeta').attr('content')
                };
                $.ajax({
                    url:  '{{url('/add-to-wishlist')}}',
                    type: 'POST',
                    data: data,
                    success: function (message) {
                        alert(message);
                    },
                    error: (error) => {
                        alert("Something wrong happened, If you aren't logged in, then you should login in first");
                    }
                });
                event.preventDefault();
            });

        })();
    </script>
@endpush
