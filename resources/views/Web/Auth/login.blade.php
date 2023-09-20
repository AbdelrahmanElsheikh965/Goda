@include('Helpers_Views.auth_header')

<!-- Start Contact Us  -->
<div class="contact-box-main">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2> Login to your account </h2> <br>
                    <form method="post">
                        @csrf
                        @include('Helpers_Views.errors')
                        {{ \Session::get('error') }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="email" placeholder="Your email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="name" name="password" placeholder="Your password">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="checkbox" name="rememberMe"> Remember Me

                                    <a style="float: right" href="{{url('/forgot-password')}}"> Forgot your password? </a>
                                </div>
                                <div class="form-group">
                                    <b>Don't have an account? </b> <a href="{{url('/register')}}"> <u> Register now </u> </a>
                                </div>
                                <div class="submit-button text-center">
                                    <button class="btn hvr-hover" id="submit" formmethod="post" formaction="{{url('/authenticate')}}" type="submit"> Authenticate </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->

@include('Helpers_Views.footer')
