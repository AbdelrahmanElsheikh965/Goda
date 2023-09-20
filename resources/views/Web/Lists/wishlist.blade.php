@extends('Web.app')

@push('meta-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Wishlist</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Wishlist  -->
    <div class="wishlist-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Unit Price </th>
                                <th>Discount (if found)</th>
                                <th>Remove Item</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($wishlistItems as $item)

                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                            <img class="img-fluid" src="{{asset('images/' . $item->cover_image)}}" alt="" />
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="{{route('products.show', $item->id)}}">
                                            {{$item->name}}
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>$ {{$item->price}}</p>
                                    </td>

                                    <td class="quantity-box">
                                        @if($item->discount) {{$item->discount}} @else No discount available @endif
                                    </td>

                                    <td class="remove-pr" id="remove" data-id="{{$item->id}}">
                                        <a style="cursor: pointer">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wishlist -->

@endsection

@push('jQuery-Ajax')
    <script src="{{asset('jquery-2.2.4.js')}}" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        (function () {
            $('td#remove').click(function (event) {
                var product_id = $(this).attr('data-id');
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{url('/remove-from-wishlist')}}',
                    type: 'POST',
                    data: {_token: CSRF_TOKEN, id: product_id},
                    success: function (message) {
                        alert(message);
                        location.reload();
                    },
                    error: function (error) {
                        alert("Something wrong happened, If you aren't logged in, then you should login first!");
                    }
                })
                event.preventDefault();
            });
        })();
    </script>
@endpush
