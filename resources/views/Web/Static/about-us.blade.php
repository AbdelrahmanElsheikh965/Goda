@extends('Web.app')

@section('content')

    <!-- Start All Title Box -->
    <div class="all-title-box" id="about_us_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>ABOUT US</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">ABOUT US</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="noo-sh-title">  <span> {{ $webParagraphs[4]->title }} </span> </h2>
                    <p> {{ $webParagraphs[4]->body }} </p>
                </div>
                <div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-thumbnail img-fluid" src="{{ $webImages[3]->image }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Page -->

@endsection
