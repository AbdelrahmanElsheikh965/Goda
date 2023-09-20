@extends('Web.app')

@push('meta-token')
    <meta id="tokenMeta" name="csrf-token" content="{{ csrf_token() }}">
@endpush

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
                                        <div class="col-sm-8 col-md-8 col-lg-3 col-xl-3">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        @if($product->discount) <p class="sale">Sale</p> @endif
                                                    </div>

                                                    <img src="{{asset('images/'.$product->cover_image)}}" style=" width: 200px; height: 150px" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="{{route('products.show', $product->id)}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li>
                                                                <a href="" data-toggle="tooltip" data-placement="right" data-id="{{$product->id}}"
                                                                   title="Add to Wishlist" class="addToWishlist">
                                                                    <i class="far fa-heart"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
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
                                        <div class="title-all text-center">
                                            <h2 style="text-align: center"> There's no P r o d u c t s. </h2>
                                        </div>
                                    @endforelse
                                </div>
                                {{$data[0]->links()}}
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- End Shop Page -->
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
                        alert("Something wrong happened, If you aren't signed in, then you should sign in first");
                    }
                });
                event.preventDefault();
            });

        })();
    </script>
@endpush
