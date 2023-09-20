@extends('Web.app')

@section('content')

@include('Helpers_Views.message')


<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        <li class="text-left">
            <img src="{{asset('storage/AdminImages/'.$webImages[0]->image)}}" loading="lazy" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong> {{$webParagraphs[0]->title}} </strong></h1>
                        <p class="m-b-40"> {{ $webParagraphs[0]->body}} </p>
                        <p><a class="btn hvr-hover" href="{{url('products/')}}">Let's Get Started</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="{{asset('storage/AdminImages/'.$webImages[1]->image)}}" loading="lazy" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong> {{$webParagraphs[1]->title}} </strong></h1>
                        <p class="m-b-40"> {{$webParagraphs[1]->body}} </p>
                        <p><a class="btn hvr-hover" href="{{url('products')}}">Click to visit</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-right">
            <img src="{{asset('storage/AdminImages/'.$webImages[2]->image)}}" loading="lazy" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong> {{$webParagraphs[2]->title}} </strong></h1>
                        <p class="m-b-40"> {{$webParagraphs[2]->body}} </p>
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
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="images/sports_shoes.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">Sports</a>
                </div>
                <div class="shop-cat-box">
                    <img class="img-fluid" src="images/sports_shoes.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">Kids Bags</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="images/Inkedkids_shoes_2.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">Kids Shoes</a>
                </div>
                <div class="shop-cat-box">
                    <img class="img-fluid" src="images/women-bag-imgl.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">Women Bags</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="images/Men_shoes.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">Men Shoes</a>
                </div>
                <div class="shop-cat-box">
                    <img class="img-fluid" src="images/Men_shoes.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">Slippers</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Categories -->

<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Featured Products</h1>
                </div>
            </div>
        </div>

        <div class="row special-list">
            <div class="col-lg-3 col-md-6 special-grid best-seller">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>
                        <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <h5> $7.79</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 special-grid top-featured">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="new">New</p>
                        </div>
                        <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <h5> $9.79</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 special-grid top-featured">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>
                        <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <h5> $10.79</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 special-grid best-seller">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>
                        <img src="images/img-pro-04.jpg" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                            </ul>
                            <a class="cart" href="#">Add to Cart</a>
                        </div>
                    </div>
                    <div class="why-text">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <h5> $15.79</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Products  -->

@endsection
