@extends('Web.app')

@push('meta-token')
    <meta id="tokenMeta" name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

    @include('Helpers_Views.message')

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="{{ $webImages[0]->image ?? '' }}" loading="lazy" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong> {{$webParagraphs[0]->title ?? '' }} </strong></h1>
                            <p class="m-b-40"> {{ $webParagraphs[0]->body ?? ''}} </p>
                            <p><a class="btn hvr-hover" href="{{url('products/')}}">Let's Get Started</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{ $webImages[1]->image ?? '' }}" loading="lazy" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong> {{$webParagraphs[1]->title ?? ''}} </strong></h1>
                            <p class="m-b-40"> {{$webParagraphs[1]->body ?? ''}} </p>
                            <p><a class="btn hvr-hover" href="{{url('products')}}">Click to visit</a></p>
                        </div>
                    </div>
                </div>
            </li>

            <li class="text-right">
                <img src="{{ $webImages[2]->image ?? ''}}" loading="lazy" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong> {{$webParagraphs[2]->title ?? ''}} </strong></h1>
                            <p class="m-b-40"> {{$webParagraphs[2]->body ?? ''}} </p>
                            <p><a class="btn hvr-hover" href="{{url('products')}}">Go shopping now</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">

                @if($subCategories->count())
                    @for($i=0; $i < $subCategories->count(); $i+=2)
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="shop-cat-box">
                                <img class="img-fluid" src="{{ $subCategories[$i]->image }}" alt="" />
                                <a class="btn hvr-hover" href="#">{{$subCategories[$i]->name}}</a>
                            </div>
                            @if($i+1 < $subCategories->count())
                                <div class="shop-cat-box">
                                    <img class="img-fluid" src="{{ $subCategories[$i+1]->image }}" alt="" />
                                    <a class="btn hvr-hover" href="#"> {{$subCategories[$i+1]->name}} </a>
                                </div>
                            @endif
                        </div>
                    @endfor
                @else
                    <div class="col-lg-12">
                        <div class="title-all text-center">
                            <h1> No Sub-categories yet </h1>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <!-- End Categories -->

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                @if($latestProducts)
                    <div class="col-lg-12">
                        <div class="title-all text-center">
                            <h1> Latest Products </h1>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row special-list">
                @forelse($latestProducts as $product)
                    <div class="col-lg-3 col-md-6 special-grid best-seller">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    @if($product->discount) <p class="sale">Sale</p> @endif
                                </div>
                                <img src="{{ $product->cover_image }}" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="{{route('products.show', $product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" class="addToWishlist" data-id="{{$product->id}}"
                                               data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4> <a href="{{route('products.show', $product->id)}}"> {{$product->name}} </a> </h4>
                                <h5> {{$product->price}} </h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <div class="title-all text-center">
                            <h1> No products yet </h1>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
    <!-- End Products  -->

@endsection

@push('jQuery-Ajax')
    <script src="{{asset('jquery-2.2.4.js')}}" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        (function () {

            $('a.addToWishlist').click(function (event) {
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
                        alert("Something wrong happened, If you aren't logged in, then you should login first");
                    }
                });
                event.preventDefault();
            });

        })();
    </script>
@endpush
