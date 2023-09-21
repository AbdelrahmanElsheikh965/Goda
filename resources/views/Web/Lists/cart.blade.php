@extends('Web.app')

@push('meta-token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')

    @if (\Session::has('success'))
        <div class="alert alert-success text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ \Session::get('success') }}</p><br>
        </div>
    @endif

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table id="cartTable" class="table">
                            <thead>
                            <tr>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                    <tr>
                                        <td class="thumbnail-img">
                                            <a href="{{route('products.show', $item->id)}}">
                                                <img class="img-fluid" src="{{asset('images/' . $item->cover_image)}}"
                                                     alt=""/>
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="{{route('products.show', $item->id)}}">
                                                {{$item->name}}
                                            </a>
                                        </td>
                                        <td class="price-pr">
                                            <p> {!! $item->discount ? "<del>$ " . $item->price ."</del> " . $item->price - ($item->price * $item->discount) : $item->price !!} </p>
                                        </td>

                                        <td class="quantity-box"><input disabled type="number" size="4"
                                                                        value="{{$item->quantity}}" min="0" step="1"
                                                                        class="c-input-text qty text"></td>
                                        <td class="total-pr">
                                            <p class="totalPrice">
                                                $ {{ session()->get('data')['products'][$item->id][1]  }}
                                        </td>
                                        <td id="delete" class="remove-pr" data-id="{{$item->id}}">
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

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div id="sum" class="ml-auto h5"> $ {{ @session()->get('data')['sum'] }} </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a id="place" href="{{url('/checkout-view')}}"
                                                           class="ml-auto btn hvr-hover">Place an order & Proceed to
                        checkout</a></div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

@endsection

@push('jQuery-Ajax')
    <script src="{{asset('jquery-2.2.4.js')}}" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>

            (function () {

                $('td#delete').click(function (event) {
                    var product_id = $(this).attr('data-id');
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{url('/remove-from-cart')}}',
                        type: 'POST',
                        data: {_token: CSRF_TOKEN, product_id: product_id},
                        success: function (message) {
                            alert(message);
                            location.reload();
                        }
                    })
                    event.preventDefault();
                });

            })();

    </script>
@endpush
