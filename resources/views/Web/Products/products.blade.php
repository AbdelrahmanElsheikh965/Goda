@extends('Web.app')

@section('content')

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Page  -->
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categori">
                    <div class="search-product">
                        <form action="{{url('/products')}}">
                            <input class="form-control" placeholder="Search here..." type="text" name="q">
                            <button type="submit"> <i class="fa fa-search"></i> </button>
                        </form>
                    </div>
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>Categories</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">

                            <div class="list-group-collapse sub-men">

                            @foreach($data[1] as $category => $subCategories)

                                <a class="list-group-item list-group-item-action" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men2">
                                    {{$category}}
                                </a>

                                <div class="collapse show" id="sub-men2" data-parent="#list-group-men">
                                    <div class="list-group">
                                    @foreach($subCategories as $id => $subCategory)
                                        <strong>
                                            &nbsp; <a href="{{url('/products', ['subCategory' => $id])}}"> {{$subCategory}} </a> ( {{ $data[2][$subCategory] }} )
                                        </strong>
                                    @endforeach
                                    </div>
                                </div>

                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box"> </div>

                    <div class="row product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    @forelse($data[0] as $product)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        @if($product->discount) <p class="sale">Sale</p> @endif
                                                    </div>

                                                    <img src="{{asset('storage/images/'.$product->cover_image)}}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="{{route('products.show', $product->id)}}" target="_blank" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="{{url('/add-to-cart', $product->id)}}">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4><a href="{{route('products.show', $product->id)}}"> {{$product->name }} </a> </h4>
                                                    <h5> {{$product->price }} </h5>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        &nbsp; &nbsp; &nbsp;
                                            <strong> There's no P r o d u c t s .</strong>
                                    @endforelse

{{--                                    {{  // TODO: Add pagination links }}--}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<!-- End Shop Page -->
@endsection

